<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
    function asset_url($path = '')
    {
        return base_url() . 'assets/' . $path;
    }
}

if (!function_exists('temp_url()')) {
    function temp_url($path = '')
    {
        return base_url() . 'temp/' . $path;
    }
}

if (!function_exists('permission()')) {
    function permission($perm)
    {
        $ci = &get_instance();
        $ci->load->library('session');

        $permissions = $ci->session->userdata('permissions') ?? [];

        return (in_array($perm, array_column($permissions, 'name')) != '' || in_array($perm, array_column($permissions, 'name')) != null);
    }
}

if (!function_exists('compareByTotal()')) {
    function compareByTotal($array)
    {
        $customSort = function ($a, $b) {
            if ($a['age'] == $b['age']) {
                return 0;
            }
            return ($a['age'] < $b['age']) ? -1 : 1;
        };

        return rsort($array, $customSort);
    }
}

if (!function_exists('validateCSV()')) {
    function validateCSV($filePath)
    {
        // Define the expected column names
        $expectedColumns = ['DATE', 'TMHSI', 'TMHI', 'DthMHSI', 'DthMHI', 'SpdMHSI', 'SpdMHI'];

        // Open the CSV file
        $file = fopen($filePath, 'r');
        if (!$file) {
            return [
                'status' => false,
                'message' => 'Failed to open the file.',
            ];
        }

        // Read the first line (header) from the CSV
        $header = fgetcsv($file);
        $header = array_filter($header, 'strlen');
        if (!$header) {
            fclose($file);
            return [
                'status' => false,
                'message' => 'Failed to read the header from the CSV.',
            ];
        }

        // Check if the header matches the expected columns
        if ($header !== $expectedColumns) {
            fclose($file);
            return [
                'status' => false,
                'message' => 'CSV file does not match the expected template.',
            ];
        }

        // Validate the data rows
        $rowNumber = 2; // Start from the second row (1-based index)
        while (($row = fgetcsv($file)) !== false) {
            $row = array_filter($row, 'strlen');
            // Check the number of columns in the row
            if (count($row) !== count($expectedColumns)) {
                fclose($file);
                return [
                    'status' => false,
                    'message' => 'Invalid number of columns in row ' . $rowNumber,
                ];
            }

            // Validate the date format (assuming it should be in YYYY-MM-DD format)
            $date = formatDate($row[0]);
            if (!validateDateFormat($date, 'd-m-Y-H:i:s')) {
                fclose($file);
                return [
                    'status' => false,
                    'message' => 'Invalid date format in row ' . $rowNumber . '(' . $date . ')',
                ];
            }

            // Validate the float values
            for ($i = 1; $i < count($row); $i++) {
                $value = $row[$i];
                if (!is_numeric($value)) {
                    fclose($file);
                    return [
                        'status' => false,
                        'message' => "Invalid float value in row " . $rowNumber . ", column " . $expectedColumns[$i],
                    ];
                }
                // Additional validation logic for each float value if needed
                // ...
            }

            $rowNumber++;
        }

        fclose($file);

        // If all validation checks pass, return a success message
        return [
            'status' => true,
            'message' => "CSV file passed validation."
        ];
    }
}

if (!function_exists('validateDateFormat()')) {
    function validateDateFormat($date, $format)
    {
        $dateTime = DateTime::createFromFormat($format, $date);
        return $dateTime && $dateTime->format($format);
    }
}

if (!function_exists('formatDate()')) {
    function formatDate($date)
    {
        list($day, $month, $year, $time) = explode('-', $date);
        list($hour, $minute, $second) = explode(':', $time);

        $day = sprintf('%02d', $day);
        $month = sprintf('%02d', $month);
        $minute = sprintf('%02d', $minute);
        $second = sprintf('%02d', $second);

        $formattedDate = "$day-$month-$year";
        $formattedTime = "$hour:$minute:$second";
        $formattedDateTime = "$formattedDate-$formattedTime";

        return $formattedDateTime;
    }
}

if (!function_exists('formatDate()')) {
    function slugify($text, $divider = '-')
    {
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        $text = preg_replace('~[^-\w]+~', '', $text);
        $text = trim($text, $divider);
        $text = preg_replace('~-+~', $divider, $text);
        $text = strtolower($text);

        if (empty($text)) {
            return '';
        }

        return $text;
    }
}
