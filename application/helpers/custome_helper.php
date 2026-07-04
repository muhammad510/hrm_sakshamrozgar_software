
<?php
// application/helpers/custom_helper.php

if (!function_exists('system_info')) {

    function system_info($attribute)
    {
        if (empty($attribute)) {
            return null;
        }

        $CI = &get_instance();

        // Load model if not loaded
        if (!isset($CI->db_model)) {
            $CI->load->model('db_model');
        }

        $row = $CI->db_model->select(
            $attribute,
            'system_config',
            ['id' => 1]
        );

        return isset($row) ? $row : null;
    }
}

?>