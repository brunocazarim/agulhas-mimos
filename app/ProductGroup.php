<?php

namespace AgulhasMimos;

use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    protected $primaryKey = 'ID_GROUP';
    public $timestamps = false;

    public function __construct($attributes = array(), $name = null, $description = null)
    {
        parent::__construct($attributes);
        if(!is_null($name) && !empty($name))
        {
            $this->validateName($name);
            $this->NAM_GROUP = $name;
            $this->updateGroup($description);
        }
    }

    private function validateName($name)
    {
        if(!is_null($name) && !empty($name))
        {
            $group = ProductGroup::GetByName($name);
            if(!is_null($group))
            {
                throw Exception("Já existe produto com nome ".$name);
            }
        }
    }

    private function updateGroup($description)
    {
        $this->DES_GROUP = $description;
        $this->IS_ACTIVE = true;
        $this->DT_LAST_MODIFICATION = date('Y-m-d H:i:s');
    }

    public static function GetById($id)
    {
        if(!is_null($id))
        {
            return ProductGroup::find($id);
        }
    }

    public static function GetByName($name)
    {
        if(!is_null($name) && !empty($name))
        {
            return ProductGroup::where('NAM_GROUP', $name)->first();
        }
    }

    public static function ListAll()
    {
        return ProductGroup::all();
    }

    public static function CreateOrUpdate($id, $name, $description)
    {
        $group = ProductGroup::GetById($id);

        if(is_null($group))
        {
            $group = new ProductGroup($attributes = array(), $name, $description);
        }
        else
        {
            $group->updateGroup($description);
        }
        return $group;
    }

    public function deleteGroup()
    {
        $this->delete();
    }
}
