<?php
/**
 * Created by PhpStorm.
 * User: Rene
 * Date: 15-05-2015
 * Time: 21:51
 */
namespace App\Column;

interface ColumnRepositoryInterface
{
    public function createColumn($column);
    public function getColumnById($columnId);
    public function deleteColumn($ColumnId);
}