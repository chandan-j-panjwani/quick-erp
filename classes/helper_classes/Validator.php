<?php
class Validator
{
    private $di;
    protected $database;
    protected $errorHandler;
    protected $rules = ["required", "minlength", "maxlength", "unique", "email"];
    protected $messages = [
        "required" => "This :field field is required",
        "minlength" => "The :field field must be a minimum of :satisfier characters",
        "maxlength" => "The :field field must be a maximum of :satisfier characters",
        "email" => "This is not a valid email address",
        "unique" => "This :field is already taken"
    ];

    /**
     * Validator Constructor.
     * @param DependencyInjector $di
     */
    public function __construct(DependencyInjector $di)
    {
        $this->di = $di;
        $this->database = $this->di->get('database');
        $this->errorHandler = $this->di->get('error_handler');
        // Util::dd($this->database);
    }
    public function check($items, $rules)
    {
        foreach ($items as $item => $value) {
            if (in_array($item, array_keys($rules))) {
                $this->validate([
                    'field' => $item,
                    'value' => $value,
                    'rules' => $rules[$item]
                ]);
            }
        }
        return $this;
    }
    public function fails()
    {
        return $this->errorHandler->hasErrors();
    }
    public function errors()
    {
        return $this->errorHandler;
    }
    private function validate($item)
    {
        // Util::dd($item);
        /**
         * $item['field'] -> contains the column name which has to be tested for validation
         * $item['value'] -> contains the value which was inserted by user in the form
         * $item['rules'] -> It is array of rules to be applied for the specific 'field'
         */
        $field = $item['field'];
        $value = $item['value'];
        foreach ($item['rules'] as $rule => $satisfier) {
            if (!call_user_func_array([$this, $rule], [$field, $value, $satisfier])) {
                // var_dump($satisfier);
                //add error into the error handler
                $this->errorHandler->addError(str_replace([':field', ':satisfier'], [$field, $satisfier], $this->messages[$rule]), $field);
            }
        }
    }
    private function required($field, $value, $satisfier)
    {
        return !empty(trim($value));
    }
    private function minlength($field, $value, $satisfier)
    {
        return mb_strlen($value) >= $satisfier;
    }
    private function maxlength($field, $value, $satisfier)
    {
        return mb_strlen($value) <= $satisfier;
    }
    private function unique($field, $value, $satisfier)
    {
        // Here $satisfier will become the name of the table
        // $field will become the name of column
        // $value should be unique under both column and table
        // Util::dd($field);
        //YAHAN PE MUJHE EXISTS KE KONSE FUNCTION KO CALL KRNA HAI WOH TEST KRNA HOGA
        $array = explode(".", $satisfier);
        $satisfier = trim($array[0]);
        if (isset($array[1]) && !empty($array[1])) {
            $id = trim($array[1]);
            return !$this->database->exists($satisfier, [$field => $value], $id);
        }
        return !$this->database->exists($satisfier, [$field => $value]);
    }
    private function email($field, $value, $satisfier)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}
