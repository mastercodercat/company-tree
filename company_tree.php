<?php

// define("COMPANY_LIST_API", 'https://5f27781bf5d27e001612e057.mockapi.io/webprovise/companies');
// define("TRAVEL_LIST_API", 'https://5f27781bf5d27e001612e057.mockapi.io/webprovise/travels');
define("COMPANY_LIST_API", 'company.json');
define("TRAVEL_LIST_API", 'travel.json');

function fetch_data($url)
{
    $response = file_get_contents($url);
    $result = json_decode($response, true);

    return $result;
}

class Travel
{
    public function __construct($company_id, $cost) {
        Company::add_travel_cost($company_id, $cost);
    }
}

class Company
{
    public $id;
    public $name;
    public $cost;
    public $parent;
    public $children;

    private static $companies = [];
    private static $top_level_companies = [];

    public function __construct($id, $name, $parent_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->parent = null;
        $this->cost = 0;
        $this->children = [];

        self::$companies[$this->id] = $this;

        if (isset(self::$companies[$parent_id])) {
            $this->parent = self::$companies[$parent_id];
            array_push($this->parent->children, $this);
        } else {
            array_push(self::$top_level_companies, $this);
        }
    }

    public function output()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'cost' => $this->cost,
            'children' => array_map(function ($child) {
                return $child->output();
            }, $this->children),
        ];
    }

    public static function get_company_tree()
    {
        return array_map(function ($child) {
            return $child->output();
        }, self::$top_level_companies);
    }

    public static function add_travel_cost($company_id, $cost)
    {
        if (!isset(self::$companies[$company_id])) {
            return;
        }

        $company = self::$companies[$company_id];
        $company->cost += $cost;

        if ($company->parent) {
            Company::add_travel_cost($company->parent->id, $cost);
        }
    }
}

class TestScript
{
    public function execute()
    {
        $start = microtime(true);

        $companies_input = fetch_data(COMPANY_LIST_API);
        $travels_input = fetch_data(TRAVEL_LIST_API);

        foreach ($companies_input as $company) {
            $c = new Company($company['id'], $company['name'], $company['parentId']);
        }
        foreach ($travels_input as $travel) {
            $t = new Travel($travel['companyId'], $travel['price']);
        }

        file_put_contents('result.json', json_encode(Company::get_company_tree()));

        echo 'Total time: ' .  (microtime(true) - $start);
    }
}

(new TestScript())->execute();
