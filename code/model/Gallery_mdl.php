<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_mdl extends CI_Model
{

function addgallery($stddata)
{
$this->db->insert('gallery',$stddata);
}


function allgalleryimage()
{
$q = $this->db->get('gallery');
return $q->result_array();
}

function deletegallery($stddata)
{
$this->db->where('pk_gid', $stddata);
$this->db->delete('gallery');

}


function getgallery($stddata)
{
$this->db->where('pk_gid',$stddata);
$q = $this->db->get('gallery');
return $q->row_array();
}

function updategallery($stddata,$stdid)
{
$this->db->where('pk_gid',$stdid);
$q = $this->db->update('gallery',$stddata);
}


}