<?php

namespace App\Models\Validators;

class FormValidation
{
    public $rules = [
        'ФИО' => [
            'isNotEmpty'
        ],
        'Группа' => [
            'isNotEmpty'
        ],
        'Телефон' => [
            'isNotEmpty',
            'isPhone'
        ],
        'Дата' => [
            'isNotEmpty'
        ],
        'Email' => [
            'isEmail'
        ]
    ];
    protected $errors = [];

    function __construct(array $rules = [])
    {
        $this->rules = $rules;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function validate(array $postArray): void
    {
        foreach ($postArray as $key => $item) {
            if (array_key_exists($key, $this->rules)) {
                foreach ($this->rules[$key] as $rule) {
                    $this->$rule($item, $key);
                }
            }
        }
    }

// правила валидации для полей формы
    public function setRule(string $fieldName, string $validatorName): void
    {
        if (!array_key_exists($fieldName, $this->rules)) {
            $this->rules[$fieldName] = [];
        }
        array_push($this->rules[$fieldName], $validatorName);
    }

    public function getError(string $key): string|false
    {
        return $this->errors;
    }

    public function checkName(mixed $p1): ?string
    {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^[А-я]{1,20}[\s]{1,3}[А-я]{1,20}[\s]{1,3}[А-я]{1,20}+$/u', $p1)) return null;
        return $this->errors['name'];
    }

    public function checkCourse(mixed $p1): ?string
    {
        if (preg_match('/^[А-я0-9-]{1,8}+$/', $p1)) return null;
        return $this->errors['emptyCourse'];
    }

    public function checkMessage(mixed $p1): ?string
    {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['emptyMessage'];
        return null;
    }

    public function checkEmail($p1): ?string
    {
        $res = $this->isNotEmpty($p1);
        if (!$res) return $this->errors['empty'];
        if (preg_match('/^([A-z0-9_\.-]+)@([A-z0-9_\.-]+)\.([A-z\.]{2,6})$/', $p1)) return null;
        return $this->errors['emailIsNotValid'];
    }

    public function isNotEmpty(mixed $data): ?string
    {
        if (empty($data)) {
            array_push($this->errors, "Поле не должно быть пустым");
        }
        return true;
    }

    public function isInteger(mixed $data): ?string
    {
        if (!is_int($data)) {
            array_push($this->errors, 'Поле должно содержать числа');
        }
        return null;
    }

    public function isLess(string $data, int $value): ?string
    {
        if (!preg_match('/^[0-9]{3,30}+$/', $data) && $data >= $value) {
            array_push($this->errors, "Поле слишком длинное");
        }
        return null;
    }

    public function isGreater(string $data, int $value): ?string
    {
        if ($this->isInteger($data) && ((int)$this->isInteger($data) <= $value)) {
            array_push($this->errors, "Поле слишком короткое");
        }
        return true;
    }

    public function isEmail($data, $key, $value = null)
    {
        if (preg_match('/^((([0-9A-Za-z]{1}[-0-9A-z\.]{1,}[0-9A-Za-z]{1})|([0-9А-Яа-я]{1}[-0-9А-я\.]{1,}[0-9А-Яа-я]{1}))@([-A-Za-z]{1,}\.){1,2}[-A-Za-z]{2,})$/u', $data)) {
            return true;
        }
        array_push($this->errors, "В поле неверно введена почта");
    }

    public function isPhone($data, $key, $value = null)
    {
        if (preg_match('/^(\+7|\+3)([0-9]{8,10})$/', $data)) {
            return true;
        }
        array_push($this->errors, "В поле неверно введен номер телефона");
    }
}
