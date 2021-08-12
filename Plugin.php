<?php

namespace Webapps\Plugin;

use App\Models\Plugin;

class alert_Plugin extends Plugin
{
    public $name;
    public $icon;
    public $version;
    public $author;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $plugin = json_decode(file_get_contents(__DIR__ . '/plugin.json'), true);
        $this->name = $plugin['name'];
        $this->icon = $plugin['icon'];
        $this->version = $plugin['version'];
        $this->author = $plugin['author'];
    }

    public $options = [
        'style' => [
            'type' => 'select',
            'label' => 'Select the Alert style',
            'required' => true,
            'options' => [
                'blue' => 'Information',
                'yellow' => 'Warning',
                'red' => 'Alert',
                'green' => 'Success',
            ]
        ],
        'title' => [
            'type' => 'text',
            'label' => 'Enter the title text',
            'maxlength' => 255,
            'required' => true
        ],
        'message' => [
            'type' => 'text',
            'label' => 'Enter the body text',
        ]
    ];

    public $new = [
        'style' => 'blue',
        'title' => '',
        'message' => ''
    ];

    public $preview = '<div class="bg-{value.style}-200 border-{value.style}-600 text-{value.style}-600 border-l-4 p-4" role="alert">
                            <p class="font-bold" data-val="value.title" />
                            <p data-val="value.message">
                        </div>';

    public function output($edit = false)
    {
        $this->edit = $edit;
        ob_start();
        require(__DIR__.'/include/_html.php');
        $html = str_replace(["\r", "\n", "\t"], '', trim(ob_get_clean()));
        $html = preg_replace('/(\s){2,}/s', '', $html);
        return $html;
    }

    public function style()
    {
        return file_get_contents(__DIR__.'/include/_style.css');
    }

    public function scripts($edit = false)
    {
        return '';
    }
}
