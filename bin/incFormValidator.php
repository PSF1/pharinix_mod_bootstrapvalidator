<?php
if (!defined("CMS_VERSION")) { header("HTTP/1.0 404 Not Found"); die(""); }

if (!class_exists("commandIncFormValidator")) {
    class commandIncFormValidator extends driverCommand {

        public static function runMe(&$params, $debug = true) {
            $path = driverCommand::run('modGetPath', array('name' => 'pharinix_mod_bootstrapvalidator'));
            
            echo '<link rel="stylesheet" href="'.CMS_DEFAULT_URL_BASE.$path['path'].'css/bootstrapValidator.min.css"/>';
            echo '<script src="'.CMS_DEFAULT_URL_BASE.$path['path'].'js/bootstrapValidator.min.js"></script>';
        }

        public static function getHelp() {
            return array(
                "package" => "pharinix_mod_bootstrapvalidator",
                "description" => __("Print HTML includes to bootstrapvalidator."), 
                "parameters" => array(), 
                "response" => array(),
                "type" => array(
                    "parameters" => array(), 
                    "response" => array(),
                ),
                "echo" => true
            );
        }
        
        public static function getAccess($ignore = "") {
            $me = __FILE__;
            return parent::getAccess($me);
        }
        
        public static function getAccessFlags() {
            return driverUser::PERMISSION_FILE_ALL_EXECUTE;
        }
    }
}
return new commandIncFormValidator();