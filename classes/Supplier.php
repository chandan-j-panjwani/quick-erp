<?php
class Supplier
{
    private $table = "suppliers";
    private $columns = ['id', 'first_name', 'last_name', 'gst_no', 'phone_no', 'email_id', 'company_name'];
    protected $di;
    private $database;
    private $validator;
    public function __construct(DependencyInjector $di)
    {
        $this->di = $di;
        $this->database = $this->di->get('database');
    }
    public function getValidator()
    {
        return $this->validator;
    }
    public function validateData($data, $id="")
    {
        $this->validator = $this->di->get('validator');
        // Util::dd($this->validator);
        $this->validator = $this->validator->check($data, [
            'first_name' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 20
            ],
            'last_name' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 20
            ],
            'email_id' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 40,
                'unique' => "{$this->table}.{$id}"
            ],
            'phone_no' => [
                'required' => true,
                'minlength' => 10,
                'unique' => "{$this->table}.{$id}"
            ],
            'gst_no' => [
                'required' => true,
                'minlength' => 15,
                'maxlength' => 15,
                'unique' => "{$this->table}.{$id}"
            ],
            'company_name' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 25,
                'unique' => "{$this->table}.{$id}"
            ],
            'block_no' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 30,
            ],
            'street' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 25,
            ],
            'city' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 25,
            ],
            'pincode' => [
                'required' => true,
                'minlength' => 6,
                'maxlength' => 6,
            ],
            'state' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 25,
            ],
            'country' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 25,
            ],
            'town' => [
                'required' => true,
                'minlength' => 3,
                'maxlength' => 25,
            ],
            ]);
        }
        public function addSupplier($data)
        {
            // Util::dd($data);
            //VALIDATE DATA
            // $this->database->table($this->table);
            $this->validateData($data);
            
            //INSERT DATA IN DATABASE
            if (!$this->validator->fails()) {
                try {
                    $this->database->beginTransaction();
                    $data_to_be_inserted = [
                        'first_name' => $data['first_name'],
                        'last_name' => $data['last_name'],
                        'gst_no' => $data['gst_no'],
                        'phone_no' => $data['phone_no'],
                        'email_id' => $data['email_id'],
                        'company_name' => $data['company_name']
                    ];
                    $supplier_id = $this->database->insert($this->table, $data_to_be_inserted);
                    $data_to_be_inserted = [
                        'block_no' => $data['block_no'],
                        'street' => $data['street'],
                        'city' => $data['city'],
                        'pincode' => $data['pincode'],
                        'state' => $data['state'],
                        'country' => $data['country'],
                        'town' => $data['town']
                    ];
                    $address_id = $this->database->insert('address', $data_to_be_inserted);
                    $this->database->insert('address_supplier', [
                        'address_id' => $address_id,
                        'supplier_id' => $supplier_id
                    ]);
                    $this->database->commit();
                return ADD_SUCCESS;
            } catch (Exception $e) {
                Util::dd($e);
                $this->database->rollBack();
                return ADD_ERROR;
            }
        }
        return VALIDATION_ERROR;
    }
    public function getJSONDataForDataTable($draw, $search_parameter, $order_by, $start, $length)
    {
        $query = "SELECT suppliers.id, suppliers.first_name, suppliers.last_name, suppliers.gst_no, suppliers.phone_no, suppliers.email_id, suppliers.company_name, address.id AS address_id, address.block_no, address.street, address.city, address.pincode, address.state, address.country, address.town FROM suppliers INNER JOIN address_supplier ON suppliers.id = address_supplier.supplier_id INNER JOIN address ON address_supplier.address_id = address.id WHERE suppliers.deleted = 0";
        $totalRowCountQuery = "SELECT COUNT(*) AS total_count FROM suppliers INNER JOIN address_supplier ON suppliers.id = address_supplier.supplier_id INNER JOIN address ON address_supplier.address_id = address.id WHERE suppliers.deleted = 0";
        $filteredRowCountQuery = "SELECT COUNT(*) AS total_count FROM suppliers INNER JOIN address_supplier ON suppliers.id = address_supplier.supplier_id INNER JOIN address ON address_supplier.address_id = address.id WHERE suppliers.deleted = 0";
        
        if ($search_parameter != null) {
            $query .= " AND (first_name LIKE '%{$search_parameter}%' OR last_name LIKE '%{$search_parameter}%')";
            $filteredRowCountQuery .= " AND (first_name LIKE '%{$search_parameter}%' OR last_name LIKE '%{$search_parameter}%')";
        }
        
        if ($order_by != null) {
            $query .= " ORDER BY {$this->columns[$order_by[0]['column']]} {$order_by[0]['dir']}";
            $filteredRowCountQuery .= " ORDER BY {$this->columns[$order_by[0]['column']]} {$order_by[0]['dir']}";
        } else {
            $query .= " ORDER BY {$this->columns[0]} ASC";
            $filteredRowCountQuery .= " ORDER BY {$this->columns[0]} ASC";
        }
        
        if ($length != -1) {
            $query .= " LIMIT {$start}, {$length}";
        }

        $totalRowCountResult = $this->database->raw($totalRowCountQuery);
        $numberOfTotalRows = is_array($totalRowCountResult) ? $totalRowCountResult[0]->total_count : 0;
        
        $filteredRowCountResult = $this->database->raw($filteredRowCountQuery);
        $numberOfFilteredRows = is_array($filteredRowCountResult) ? $filteredRowCountResult[0]->total_count : 0;
        
        $fetchedData = $this->database->raw($query);
        $data = [];
        $numRows = is_array($fetchedData) ? count($fetchedData) : 0;
        $basePages = BASEPAGES;
        for ($i = 0; $i < $numRows; $i++) {
            $subArray = [];
            $subArray[] = $start + $i + 1;
            $subArray[] = $fetchedData[$i]->first_name;
            $subArray[] = $fetchedData[$i]->last_name;
            $subArray[] = $fetchedData[$i]->gst_no;
            $subArray[] = $fetchedData[$i]->phone_no;
            $subArray[] = $fetchedData[$i]->email_id;
            $subArray[] = $fetchedData[$i]->company_name;
            $subArray[] = $fetchedData[$i]->block_no;
            $subArray[] = $fetchedData[$i]->street;
            $subArray[] = $fetchedData[$i]->town;
            $subArray[] = $fetchedData[$i]->city;
            $subArray[] = $fetchedData[$i]->state;
            $subArray[] = $fetchedData[$i]->pincode;
            $subArray[] = $fetchedData[$i]->country;
            $subArray[] = <<<BUTTONS
            <a href="{$basePages}edit-supplier.php?id={$fetchedData[$i]->id}" class='btn btn-outline-primary btn-sm'><i class="fas fa-pencil-alt"></i></a>
            <button class='btn btn-outline-danger btn-sm delete' data-id='{$fetchedData[$i]->id}' data-toggle='modal' data-target='#deleteModal'><i class="fas fa-trash-alt"></i></button>
BUTTONS;
            $data[] = $subArray;
        }
        
        $output = array(
            'draw' => $draw,
            'recordsTotal' => $numberOfTotalRows,
            'recordsFiltered' => $numberOfFilteredRows,
            'data' => $data
        );
        echo json_encode($output);
    }
    public function getSupplierByID($id, $fetchMode = PDO::FETCH_OBJ)
    {
        $query = "SELECT suppliers.id, suppliers.first_name, suppliers.last_name, suppliers.gst_no, suppliers.phone_no, suppliers.email_id, suppliers.company_name, address.id AS address_id, address.block_no, address.street, address.city, address.pincode, address.state, address.country, address.town FROM suppliers INNER JOIN address_supplier ON suppliers.id = address_supplier.supplier_id INNER JOIN address ON address_supplier.address_id = address.id WHERE suppliers.id = {$id} AND suppliers.deleted = 0";
        $result = $this->database->raw($query, $fetchMode);
        return $result;
    }
    public function update($data, $id)
    {
        $this->validateData($data, $id);
        if (!$this->validator->fails()) {
            try {
                $this->database->beginTransaction();
                $data_to_be_updated = [
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'gst_no' => $data['gst_no'],
                    'phone_no' => $data['phone_no'],
                    'email_id' => $data['email_id'],
                    'company_name' => $data['company_name']
                ];
                $this->database->update($this->table, $data_to_be_updated, "id = {$id}");
                $data_to_be_updated = [
                    'block_no' => $data['block_no'],
                    'street' => $data['street'],
                    'city' => $data['city'],
                    'pincode' => $data['pincode'],
                    'state' => $data['state'],
                    'country' => $data['country'],
                    'town' => $data['town'],
                ];
                $query = "SELECT address_id FROM address_supplier WHERE supplier_id = $id";
                $id = $this->database->raw($query)[0]->address_id;
                // Util::dd($id);
                $this->database->update('address', $data_to_be_updated, "id = {$id}");
                $this->database->commit();
                return UPDATE_SUCCESS;
            } catch (Exception $e) {
                Util::dd($e);
                $this->database->rollBack();
                return UPDATE_ERROR;
            }
        } else {
            return VALIDATION_ERROR;
        }
    }
    public function delete($id)
    {
        try {
            $this->database->beginTransaction();
            $result = $this->database->raw("SELECT * FROM address_supplier WHERE supplier_id = $id")[0];
            $address_id = $result->address_id;
            $address_supplier_id = $result->id;
            $this->database->delete($this->table, "id = {$id}");
            $this->database->delete('address', "id = {$address_id}");
            $this->database->query("DELETE FROM address_supplier WHERE id = {$address_supplier_id}");
            $this->database->commit();
            return DELETE_SUCCESS;
        } catch (Exception $e) {
            Util::dd($e);
            $this->database->rollBack();
            return DELETE_ERROR;
        }
    }
}
