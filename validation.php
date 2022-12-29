<?php
function validation($request) {
    $errors = [];

    if ( empty($request['name']) || 20 < mb_strlen($request['name'])) {
        $errors[] = '氏名は必須です。また、20文字以内で入力して下さい！';
    }

    if ( empty($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL) ) {
        $errors[] = 'メールアドレスは必須です。また、正しい形式で入力して下さい！';
    }

    return $errors;
}

?>