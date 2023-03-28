<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Le champ :attribute doit être accepté.',
    'active_url' => 'Le champ :attribute n\'est pas une URL valide.',
    'after' => 'Le champ :attribute doit être une date postérieure à :date.',
    'after_or_equal' => 'Le champ :attribute doit être une date postérieure ou égale à :date.',
    'alpha' => 'Le champ :attribute ne doit contenir que des lettres.',
    'alpha_dash' => 'Le champ :attribute ne doit contenir que des lettres, des chiffres, des tirets et des caractères de soulignement.',
    'alpha_num' => 'Le champ :attribute ne doit contenir que des lettres et des chiffres.',
    'array' => 'Le champ :attribute doit être un tableau.',
    'before' => 'Le champ :attribute doit être une date antérieure à :date.',
    'before_or_equal' => 'Le champ :attribute doit être une date antérieure ou égale à :date.',
    'between' => [
        'numeric' => 'Le champ :attribute doit être compris entre :min et :max.',
        'file' => 'Le champ :attribute doit être compris entre :min et :max kilobytes.',
        'string' => 'Le champ :attribute doit être compris entre :min et :max caractères.',
        'array' => 'Le champ :attribute doit avoir entre :min et :max éléments.',
    ],
    'boolean' => 'Le champ :attribute doit être vrai(1) or faux(0).',
    'confirmed' => 'Le champ :attribute de la confirmation ne correspond pas.',
    'current_password' => 'Le champ mot de passe est incorrect.',
    'date' => 'Le champ :attribute n\'est pas une date valide.',
    'date_equals' => 'Le champ :attribute doit être une date égale à :date.',
    'date_format' => 'Le champ :attribute ne correspond pas au format :format.',
    'different' => 'Les champs :attribute et :other doivent être différents.',
    'digits' => 'Le champ :attribute doit être un :digits chiffre.',
    'digits_between' => 'Le champ :attribute doit être compris entre :min et :max chiffre.',
    'dimensions' => 'Le champ :attribute a des dimensions d\'image invalides.',
    'distinct' => 'Le champ :attribute a une valeur dupliquée.',
    'email' => 'Le champ :attribute doit être une adresse électronique valide.',
    'ends_with' => 'Le champ :attribute doit se terminer par l\'un des éléments suivants: :values.',
    'exists' => 'Le champ choisi :attribute est invalide.',
    'file' => 'Le champ :attribute doit être un fichier.',
    'filled' => 'Le champ :attribute field doit avoi une valeur.',
    'gt' => [
        'numeric' => 'Le champ :attribute doit être supérieure à :value.',
        'file' => 'Le champ :attribute doit être supérieure à :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieure à :value caractères.',
        'array' => 'Le champ :attribute doit avoir plus de :value éléments.',
    ],
    'gte' => [
        'numeric' => 'Le champ :attribute doit être supérieure ou égal à :value.',
        'file' => 'Le champ :attribute doit être supérieure ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être supérieure ou égal à :value caractères.',
        'array' => 'Le champ :attribute doit avoir :value éléments ou plus.',
    ],
    'image' => 'Le champ :attribute doit être une image.',
    'in' => 'The selected :attribute est invalide.',
    'in_array' => 'Le champ :attribute field n\'existe pas dans :other.',
    'integer' => 'Le champ :attribute doit être un entier.',
    'ip' => 'Le champ :attribute doit être une adresse IP valide.',
    'ipv4' => 'Le champ :attribute doit être une adresse IPV4 valide.',
    'ipv6' => 'Le champ :attribute doit être une adresse IPV6 valide.',
    'json' => 'Le champ :attribute doit être un chaîne JSON valide.',
    'lt' => [
        'numeric' => 'Le champ :attribute doit être inférieur à :value.',
        'file' => 'Le champ :attribute doit être inférieur à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur à :value caractères.',
        'array' => 'Le champ :attribute doit avoir moins de :value éléments.',
    ],
    'lte' => [
        'numeric' => 'Le champ :attribute doit être inférieur ou égal à :value.',
        'file' => 'Le champ :attribute doit être inférieur ou égal à :value kilobytes.',
        'string' => 'Le champ :attribute doit être inférieur ou égal à :value caractères.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :value éléments.',
    ],
    'max' => [
        'numeric' => 'Le champ :attribute ne doit pas être supérieur à :max.',
        'file' => 'Le champ :attribute ne doit pas être supérieur à :max kilobytes.',
        'string' => 'Le champ :attribute ne doit pas être supérieur à :max caractères.',
        'array' => 'Le champ :attribute ne doit pas avoir plus de :max éléments.',
    ],
    'mimes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'mimetypes' => 'Le champ :attribute doit être un fichier de type: :values.',
    'min' => [
        'numeric' => 'Le champ :attribute doit avoir au moins :min.',
        'file' => 'Le champ :attribute doit avoir au moins :min kilobytes.',
        'string' => 'Le champ :attribute doit avoir au moins :min caractères.',
        'array' => 'Le champ :attribute doit avoir au moins :min éléments.',
    ],
    'multiple_of' => 'Le champ :attribute doit être un multiple de :value.',
    'not_in' => 'The selected :attribute est invalide.',
    'not_regex' => 'Le champ :attribute a un format invalide.',
    'numeric' => 'Le champ :attribute doit être un nombre.',
    'password' => 'Le Mot de passe est incorrect.',
    'present' => 'Le champ :attribute doit être présent.',
    'regex' => 'Le champ :attribute a un format invalide.',
    'required' => 'Le champ :attribute est réquis.',
    'required_if' => 'Le champ :attribute field est réquis  :other est :value.',
    'required_unless' => 'Le champ :attribute est réquis à moins que :other est dans :values.',
    'required_with' => 'Le champ :attribute est réquis quand :values est présent.',
    'required_with_all' => 'Le champ :attribute est réquis quand :values are présent.',
    'required_without' => 'Le champ :attribute est réquis quand :values n\'est pas présent.',
    'required_without_all' => 'Le champ :attribute est réquis quand aucun des :values est présent.',
    'prohibited' => 'Le champ :attribute field est interdit.',
    'prohibited_if' => 'Le champ :attribute est interdit quand :other est :value.',
    'prohibited_unless' => 'Le champ :attribute est interdit à moins que :other est dans :values.',
    'same' => 'Le champ :attribute et :other doivent être indentiques.',
    'size' => [
        'numeric' => 'Le champ :attribute doit être :size.',
        'file' => 'Le champ :attribute doit être :size kilobytes.',
        'string' => 'Le champ :attribute doit être :size caractères.',
        'array' => 'Le champ :attribute doit contenir :size éléments.',
    ],
    'starts_with' => 'Le champ :attribute doit commencer par l\'un des éléments suivants: :values.',
    'string' => 'Le champ :attribute doit être une chaîne.',
    'timezone' => 'Le champ :attribute doit être zone valide.',
    'unique' => 'Le champ :attribute a déjà été prise.',
    'uploaded' => 'Le champ :attribute n\'a pas réussi à télécharger.',
    'url' => 'Le champ :attribute a un format invalide.',
    'uuid' => 'Le champ :attribute doivent être un UUID valide.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
