<?php

namespace App\Support;

class StatusReport {
    
    public $statuses = null;
    public $status = null;
    public $statusListObj = 
    '[
        {
            "id":"0",
            "status_en":"",
            "status_ar":""
        },
        {
            "id":"1",
            "status_en":"stolen",
            "status_ar":"مسروق"
        },
        {
            "id":"2",
            "status_en":"missing",
            "status_ar":"مفقود"
        },
        {
            "id":"3",
            "status_en":"found",
            "status_ar":"مملوك"
        }
    ]';
    public function __construct($id=null)
    {
        $this->statuses = $this->statusListObj();
        if($id != null)
        {
            $this->status = $this->get($id);
        }
    }
    private function statusListObj()
    {
        return json_decode( $this->statusListObj );
    }
    public static function new($id=null) : StatusReport
    {
        return new self($id);
    }
    public function list() : array
    {
        $statuses = array();
        foreach ($this->statuses as $statusObj) {
            $statuses[] = new Status($statusObj);
        }
        return $statuses;
    }
    public function get($id) : Status|null
    {
        $status = null;
        foreach ($this->statuses as $statusObj) {
            $status = new Status($statusObj);
            if($statusObj->id == $id)
            {
                return $status;
            }
        }
        return $status;
    }
    // public function id() : string|int
    // {
    //     return $this->status->id;
    // }
    // public function status_en() : string
    // {
    //     return $this->status->status_en;
    // }
    // public function status_ar() : string
    // {
    //     return $this->status->status_ar;
    // }
    // public function status(string $lang = "en") : string
    // {
    //     if($lang === "ar")
    //     {
    //         return $this->status->status_ar;
    //     }
    //     return $this->status->status_en;
    // }

    // public function findByName($name="normal") : Status
    // {
    //     $status = null;
    //     foreach($this->list() as $statusObj)
    //     {
    //         $status = new Status($statusObj);
    //         if($statusObj->status_en == $name || $statusObj->status_ar == $name)
    //         {
    //             return $status;
    //         }
    //     }
    //     return $status;
    // }
    
}

class Status
{
    public $id, $status_en, $status_ar;
    public function __construct(object $stdClass)
    {
        $this->id = $stdClass->id;
        $this->status_en = $stdClass->status_en;
        $this->status_ar = $stdClass->status_ar;
    }
    public function id() : string|int
    {
        return $this->id;
    }
    public function status_en() : string
    {
        return $this->status_en;
    }
    public function status_ar() : string
    {
        return $this->status_ar;
    }
    public function status(string $lang = "en") : string
    {
        if($lang === "ar")
        {
            return $this->status_ar;
        }
        return $this->status_en;
    }
}