<?php
namespace App\Column;


class ColumnRepository implements ColumnRepositoryInterface
{
    public function createColumn($column){
        return $column->save();
    }

    public function getColumnById($columnId){
        return Column::where('id',$columnId)->with(['content'])->first();
    }

    public function deleteColumn($ColumnId){
        $column = Column::find($ColumnId);
        $column->delete();
    }
} 