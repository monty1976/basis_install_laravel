<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 02-05-2015
 * Time: 14:04
 */
namespace App\Nursery;

interface NurseryRepositoryInterface
{
    public function getNurseryActivitiesById($id);
    
    public function getNurseryUsers($nurser_id);
    
}