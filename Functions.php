<?php
    class Form {
        public string $action;
        public string $method;
        public string $formBuild;
        public $formFields = [];

        public function __construct($action = '', $method = '')
        {
            $this->action = $action;
            $this->method = $method;
        }

        public function addField($action = null) {
            if(isset($this->formFields)) {
                $this->formFields[] = $action;
            }
            return false;
        }

        public function display() {
            $this->formBuild = "<form name='submit_form' action='{$this->action}' method='{$this->method}'>";

            if(isset($this->formFields)) {
                foreach($this->formFields as $field) {
                    $this->formBuild .= "<div>" . $field->field . "</div>";
                }
            }

            $this->formBuild .= "</form>";

            # Show form with build all fields
            echo $this->formBuild;
            return false;
        }
    }

    /**
     * Class InputField
     * @params string
     * @return html
     */
    class InputField {
        public string $value;
        public string $field;

        public function __construct($value = '')
        {
            $this->value = $value;
            $this->field = "<label for='check'>". ucfirst($this->value) .":</label> <input type='text' placeholder='{$this->value}' />";

            if(isset($value) && is_string($value))
                return $this->field;

            return false;
        }
    }

    /**
     * Class Textarea for form
     * @params string
     * @return html
     */

    class Textarea {
        public string $value;
        public string $field;

        public function __construct($value = '')
        {
            $this->value = $value;
            
            $this->field = "<label for='check'>". ucfirst($this->value) .":</label> <textarea name='textarea' placeholder='{$this->value}'></textarea>";
            if(isset($value) && is_string($value))
                return $this->field;

            return false;
        }
    }

    /**
     * Class Checkbox for form
     * @params string
     * @return html
     */

    class Checkbox {
        public string $value;
        public string $field;

        public function __construct($value = '')
        {
            $this->value = $value;
            $this->value = str_replace("_", " ", $this->value);

            $this->field = "<input type='checkbox' id='check' name='{$this->value}' /> <label for='check'>{$this->value}</label>";

            if(isset($value) && is_string($value))
                return $this->field;

            return false;
        }
    }
