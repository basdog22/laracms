<?php

class Lara extends Eloquent
{


    public function save(array $options = array())
    {

        if(!$this->exists()){
            parent::save();
        }



        $langs = Languages::all();
        foreach ($langs as $lang) {
            $translation = Translations::find($this->table . "_" . $this->id . "_" . strtolower($lang->code));
            if ($lang->code == Config::get('cms.currlang.code') || !isset($translation->exists)) {
                //check if translation exists

                if(isset($translation->exists)){

                }else{
                    $translation = new Translations;
                }

                $translation->id = $this->table . "_" . $this->id . "_" . strtolower($lang->code);
                $translation->translation = json_encode($this->getAttributes());
                $translation->save();
            }
        }
        return;
    }

    public static function find($id, $columns = array('*'))
    {
        if (is_array($id) && empty($id)) return new Collection;

        $instance = new static;

        $obj = $instance->newQuery()->find($id, $columns);

//        if ($lang->code != Config::get('cms.currlang.code')) {
            $translation = Translations::find($obj->table . "_" . $obj->id . "_" . strtolower(Config::get('cms.currlang.code')));

            $obj->setRawAttributes(json_decode($translation->translation, 1));
//        }
//        Commoner::debug($obj->table . "_" . $obj->id . "_" . strtolower(Config::get('cms.currlang.code')),$translation);
        return $obj;
    }


}