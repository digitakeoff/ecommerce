<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Product extends Eloquent
{
    use HasFactory;

    protected $with = ['images','brand', 'model', 'city', 'state'];

    protected $fillable = [
        'name', 'slug', 'price', 'state_id', 'city_id', 'address',
        'user_id', 'condition', 'description', 'main_image_index', 
        'brand_id', 'model_id', 'color', 'year'
    ];



    public $categories = [ 
        'laptops' => [
           
            'general' => [
                // [
                //     'name' => 'model',
                //     'input' => 'text',
                //     'type' => 'string',
                //     'value' => []
                // ],

                [
                    'name' => 'operating system',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => [
                        'Android 11',
                        'Android 5.1',
                        'Android 6.0',
                        'Android 8.1',
                        'Chrome OS',
                        'Chrome OS for Enterprise',
                        'ChromeOS',
                        'DOS License',
                        'Endless OS',
                        'eShell',
                        'FreeDOS',
                        'HP ThinPro OS',
                        'Linux',
                        'Linux Linpus',
                        'Linux SUSE',
                        'Linux Ubuntu',
                        'Mac OS X 10.6 Snow Leopard',
                        'N/A',
                        'Windows 10',
                        'Windows 10 Advanced',
                        'Windows 10 Education',
                        'Windows 10 Enterprise',
                        'Windows 10 Family',
                        'Windows 10 Home',
                        'Windows 10 Home S',
                        'Windows 10 IoT',
                        'Windows 10 IoT Core',
                        'Windows 10 IoT Enterprise',
                        'Windows 10 Mobile',
                        'Windows 10 Pro',
                        'Windows 10 Pro Academic',
                        'Windows 10 Pro Education',
                        'Windows 10 Pro for Workstations',
                        'Windows 10 Pro in S mode',
                        'Windows 10 S',
                        'Windows 11',
                        'Windows 11 Home',
                        'Windows 11 Home Advanced',
                        'Windows 11 Home in S mode',
                        'Windows 11 Pro',
                        'Windows 11 Pro Academic',
                        'Windows 11 Pro Education',
                        'Windows 11 Pro for Workstations',
                        'Windows 11 S',
                        'Windows 11 SE',
                        'Windows 7 Home Basic',
                        'Windows 7 Home Premium',
                        'Windows 7 Professional',
                        'Windows 7 Starter',
                        'Windows 8',
                        'Windows 8 Pro',
                        'Windows 8.1',
                        'Windows 8.1 Pro',
                        'Windows 8.1 with Bing',
                        'Windows Vista Business',
                        'Windows Vista Home Premium',
                        'Windows XP Home Edition',
                        'Windows XP Professional'
                    ]
                ],

                // [
                //     'name' => 'series',
                //     'input' => 'text',
                //     'type' => 'string',
                //     'ph'   => 'e.g Pavilion g6',
                //     'value' => []
                // ],

                // [
                //     'name' => 'weight',
                //     'input' => 'text',
                //     'type' => 'string',
                //     'ph'   => 'e.g 20',
                //     'unit' => 'kg',
                //     'value' => []
                // ],

                [
                    'name' => 'utility',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => [
                        'Beginner',
                        'Business',
                        'Cloud computing',
                        'Consumer',
                        'Educational',
                        'Everyday',
                        'Gaming',
                        'High performance',
                        'Home',
                        'Multimedia',
                        'Performance',
                        'Premium',
                        'Special edition',
                        'Work'
                    ]
                ],

                [
                    'name' => 'device type',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => [
                        'Chromebook',
                        'Hybrid (2-in-1)',
                        'Mobile server',
                        'Mobile thin client',
                        'Mobile workstation',
                        'Netbook',
                        'Notebook',
                        'PC',
                        'Ultrabook',
                        'Ultraportable'                    
                    ]
                ],

                // [
                //     'name' => 'brand',
                //     'input' => 'select',
                //     'type' => 'string',
                //     'value' => [
                //         'Acer',
                //         'Alienware',
                //         'ASUS',
                //         'DELL',
                //         'Dynabook',
                //         'Fujitsu',
                //         'Gigabyte',
                //         'HP',
                //         'Huawei',
                //         'Lenovo',
                //         'LG',
                //         'MEDION',
                //         'Microsoft',
                //         'MSI',
                //         'Samsung',
                //         'Sony',
                //         'Thomson',
                //         'Toshiba'
                //     ]
                // ],
            ],

            'networking' => [
                [
                    'name' => 'Ethernet Lan',
                    'input' => 'radio',
                    'type' => 'string',
                    'value' => ['yes', 'no']
                ],

                [
                    'name' => 'wi-fi',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => [
                        'IEEE 802.11a',
                        'IEEE 802.11ac',
                        'IEEE 802.11ad',
                        'IEEE 802.11b',
                        'IEEE 802.11n',
                        'Wi-Fi 4 (802.11n)',
                        'Wi-Fi 5 (802.11a?)',
                        'Wi-Fi 5 (802.11ac)',
                        'Wi-Fi 6 (802.11ax)',
                        'Wi-Fi 6E (802.11ax)',
                        '802.11a',
                        '802.11ad',
                        '802.11b'
                    ]
                ],

                [
                    'name' => 'bluetooth',
                    'input' => 'radio',
                    'type' => 'string',
                    'value' => ['yes', 'no']
                ],

                [
                    'name' => 'sim card support',
                    'input' => 'radio',
                    'type' => 'string',
                    'value' => ['yes', 'no']
                ]
            ],

            'keyboard' => [
                [
                    'name' => 'backlit',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ],

                [
                    'name' => 'numeric',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ],

                [
                    'name' => 'full',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ]
            ],

            'storage' => [
                [
                    'name' => 'capacity',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'GB',
                    'ph' => 'e.g 512',
                    'value' => []
                ],

                [
                    'name' => 'type',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => ['HDD', 'SSD']
                ],

                
                [
                    'name' => 'card slot',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ]

            ],

            'memory' => [
                [
                    'name' => 'type',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => [
                        'DDR-SDRAM',
                        'DDR2-SDRAM',
                        'DDR3-SDRAM',
                        'DDR3L-RS-SDRAM',
                        'DDR3L-SDRAM',
                        'DDR4-SDRAM',
                        'DDR5-SDRAM',
                        'LPDDR2-SDRAM',
                        'LPDDR3-SDRAM',
                        'LPDDR3L-SDRAM',
                        'LPDDR4-SDRAM',
                        'LPDDR4x-SDRAM',
                        'LPDDR5-SDRAM',
                        'LPDDR5x-SDRAM' 
                    ]
                ],

                [
                    'name' => 'size',
                    'input' => 'text',
                    'type' => 'string',
                    'unit'  => 'GB',
                    'ph'  => '4',
                    'value' => []
                ],

                [
                    'name' => 'speed',
                    'input' => 'text',
                    'type' => 'string',
                    'unit'  => 'GHz',
                    'ph'  => '4',
                    'value' => []
                ],
            ],

            'processor' => [
                [
                    'name' => 'family',
                    'input' => 'text',
                    'type' => 'string',
                    'ph'  => 'e.g Core i5',
                    'value' => []
                ],

                [
                    'name' => 'generation',
                    'input' => 'text',
                    'type' => 'string',
                    'ph'  => 'e.g 8',
                    'value' => []
                ],

                [
                    'name' => 'cache',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'MB',
                    'ph' => '12',
                    'value' => []
                ],

                [
                    'name' => 'number of core',
                    'input' => 'text',
                    'type' => 'string',
                    'value' => []
                ],

                [
                    'name' => 'model',
                    'input' => 'text',
                    'type' => 'string',
                    'value' => []
                ],

                [
                    'name' => 'brand',
                    'input' => 'text',
                    'type' => 'string',
                    'value' => []
                ],


                [
                    'name' => 'speed',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'GHz',
                    'ph' => '3.2',
                    'value' => []
                ],

                [
                    'name' => 'boost speed',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'GHz',
                    'ph' => '3.2',
                    'value' => []
                ]
            ],

            'gpu' => [
                [
                    'name' => 'brand',
                    'input' => 'select',
                    'type' => 'string',
                    'value' => [
                        'AMD',
                        'Intel',
                        'NVIDIA'                   
                    ]
                ],

                [
                    'name' => 'model',
                    'input' => 'text',
                    'type' => 'string',
                    'value' => []
                ],

                [
                    'name' => 'memory size',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'GB',
                    'ph' => 'e.g 512',
                    'value' => []
                ]
            ],

            'battery' => [
                [
                    'name' => 'capacity',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'mAh',
                    'value' => []
                ],

                [
                    'name' => 'life',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'hrs',
                    'value' => []
                ]
            ],

            'screen' => [
                [
                    'name' => 'size',
                    'input' => 'text',
                    'type' => 'string',
                    'unit' => 'inches',
                    'value' => []
                ],

                [
                    'name' => 'resolution',
                    'input' => 'text',
                    'type' => 'string',
                    'ph' => 'e.g 1376 x 1280',
                    'value' => []
                ],

                [
                    'name' => 'touchscreen',
                    'input' => 'radio',
                    'type' => 'string',
                    
                    'value' => ['yes', 'no']
                ]
            ],        

            'more' => [
                [
                    'name' => 'finger print',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ],

                [
                    'name' => 'camera',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ],

                [
                    'name' => 'optical drive',
                    'input' => 'radio',
                    'type' => 'boolean',
                    'value' => ['yes', 'no']
                ],
            ]
        ]
    ];

    public function getFillables(){
        return $this->fillable;
    }
    
    protected $hidden = [
        'user_id', 'state_id', 'city_id', 'brand_id', 'model_id'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

   

    public function meta()
    {
        return $this->morphMany(Meta::class, 'metable');
    }


    public function city()
    {
        return $this->belongsTo(City::class);
    }

    

}
