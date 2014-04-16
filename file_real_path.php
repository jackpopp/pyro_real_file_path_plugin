<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Real File Path Plugin
 *
 * Get real file path of a download file
 *
 * @author      Jack Hannigan Popp
 * @copyright   Copyright (c) 2014 Jack Hannigan Popp
 *
 */
class Plugin_File_Real_Path extends Plugin
{

    public $version = '1';

    public $name = array(
        'en'    => 'File Real Path'
    );

    public $description = array(
        'en'    => 'Get real path to a file.'
    );

    public function __construct()
    {
        $this->load->library('files/files');
    }

    /**
     * Returns a PluginDoc array that PyroCMS uses 
     * to build the reference in the admin panel
     *
     * All options are listed here but refer 
     * to the Blog plugin for a larger example
     *
     * @return array
     */
    public function _self_doc()
    {
        $info = array(
            'get' => array(
                'description' => array(
                    'en' => 'Returns the real path of a file download path.'
                ),         
                'single' => true,
                'double' => false,
            )
        );
    
        return $info;
    }

    /**
    * Get
    *
    * Takes a filepath or id and returns the real path to the file
    *
    * @param String ID
    * @param String file
    * @return String
    **/


    // {{ file_real_path:get}}

    public function get()
    {
        // look for values
        $file = $this->attribute('file');
        $id = $this->attribute('id');

        // we either get by id or access the file object to get the id
        // lets look in the file object for the id
        if ($file)
        {
            $arrayString = explode('/', $file);
            $id = end($arrayString);
        }

        // check id is set and stuff
        if ($id){
            $this->db->from('default_files');
            $this->db->where('id', $id);
            $query = $this->db->get()->result()[0];
            return $this->config->base_url().'uploads/default/files/'.$query->filename;
        } 

        return 'No id set';
    }

}