# Company Tree

Develop a script to build a company tree with associated travel cost.

## Author

@mastercodercat

## Note

Using a PHP version greater than 7.3 is strongly recommended.

## Requirements

- Two API endpoints needed for retrieving Company List and Travel List:
  1. Company List: https://5f27781bf5d27e001612e057.mockapi.io/webprovise/companies
  2. Travel List: https://5f27781bf5d27e001612e057.mockapi.io/webprovise/travels
- Process data from the two provided APIs to have a nested array of companies with travel cost
- The travel cost of a particular company is the total travel price of employees in that company and its child companies
- Output of nested array should look like this:

```php
[
    'id' => 'uuid-16',
    'name' => 'Webprovise Corp',
    'cost' => 9696,
    'children' => [
        'id' => 'uuid-18',
        'name' => 'Walter, Schmidt and Osinski',
        'cost' => 6969,
        'children' => []
    ]
];
```

## How to execute

```sh
php company_tree.php
```

## Result

```json
[
  {
    "id": "uuid-1",
    "name": "Webprovise Corp",
    "cost": 52983,
    "children": [
      {
        "id": "uuid-2",
        "name": "Stamm LLC",
        "cost": 5199,
        "children": [
          {
            "id": "uuid-4",
            "name": "Price and Sons",
            "cost": 1340,
            "children": []
          },
          {
            "id": "uuid-7",
            "name": "Zieme - Mills",
            "cost": 1636,
            "children": []
          },
          {
            "id": "uuid-19",
            "name": "Schneider - Adams",
            "cost": 794,
            "children": []
          }
        ]
      },
      {
        "id": "uuid-3",
        "name": "Blanda, Langosh and Barton",
        "cost": 15713,
        "children": [
          {
            "id": "uuid-5",
            "name": "Hane - Windler",
            "cost": 1288,
            "children": []
          },
          {
            "id": "uuid-6",
            "name": "Vandervort - Bechtelar",
            "cost": 2512,
            "children": []
          },
          {
            "id": "uuid-9",
            "name": "Kuhic - Swift",
            "cost": 3086,
            "children": []
          },
          {
            "id": "uuid-17",
            "name": "Rohan, Mayer and Haley",
            "cost": 4072,
            "children": []
          },
          {
            "id": "uuid-20",
            "name": "Kunde, Armstrong and Hermann",
            "cost": 908,
            "children": []
          }
        ]
      },
      {
        "id": "uuid-8",
        "name": "Bartell - Mosciski",
        "cost": 28817,
        "children": [
          {
            "id": "uuid-10",
            "name": "Lockman Inc",
            "cost": 4288,
            "children": []
          },
          {
            "id": "uuid-11",
            "name": "Parker - Shanahan",
            "cost": 12236,
            "children": [
              {
                "id": "uuid-12",
                "name": "Swaniawski Inc",
                "cost": 2110,
                "children": []
              },
              {
                "id": "uuid-14",
                "name": "Weimann, Runolfsson and Hand",
                "cost": 7254,
                "children": []
              }
            ]
          },
          {
            "id": "uuid-13",
            "name": "Balistreri - Bruen",
            "cost": 1686,
            "children": []
          },
          {
            "id": "uuid-15",
            "name": "Predovic and Sons",
            "cost": 4725,
            "children": []
          },
          {
            "id": "uuid-16",
            "name": "Weissnat - Murazik",
            "cost": 3277,
            "children": []
          }
        ]
      },
      {
        "id": "uuid-18",
        "name": "Walter, Schmidt and Osinski",
        "cost": 2033,
        "children": []
      }
    ]
  },
  {
    "id": "uuid-34",
    "name": "Halvorson, Huels and Collier",
    "cost": 0,
    "children": [
      {
        "id": "uuid-35",
        "name": "Heaney, Cruickshank and Kuphal",
        "cost": 0,
        "children": []
      }
    ]
  },
  { "id": "NaN", "name": "Parisian LLC", "cost": 0, "children": [] },
  { "id": "NaN", "name": "Dare and Sons", "cost": 0, "children": [] },
  { "id": "NaN", "name": "Reinger - Wilkinson", "cost": 0, "children": [] },
  {
    "id": "NaN",
    "name": "Tillman, Rosenbaum and Bosco",
    "cost": 0,
    "children": []
  }
]
```
