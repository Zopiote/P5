<?php

class Form {

    private $httpRequest;
    public $fields = [];

    public function handle($httpRequest) {
        $this->httpRequest = $httpRequest;

        foreach($this->fields as $name => &$field) {
            $field['value'] = $this->httpRequest->getRequest()[$name] ?? null;
        }
    }

    public function add(string $name, string $label, array $constraints = [])
    {
        $this->fields[$name] = [
            "label" => $label,
            "value" => null,
            "errors" => [],
            "constraints" => $constraints
        ];
    }

    public function isSubmitted(): bool {
        return $this->httpRequest->getMethod() == "POST";
    }

    public function isValid(): bool {
        foreach($this->fields as &$field) {
            foreach($field["constraints"] as $constraint) {
                $test = $constraint($field['value']);
                if(!$test['assertion']) {
                    $field['errors'][] = $test['message'];
                }
            }
        }

        return array_sum(array_map(function(array $field) {
            return count($field['errors']);
        }, $this->fields)) == 0;
    }
}