# Plugin API endpoints

### Get list of field groups

Request URL:

```
GET - {{ _.MAUTIC_API_URL }}/mz/field-groups
GET - {{ _.MAUTIC_API_URL }}/mz/field-groups/{{recordId}}
```

Example Response:

```
{
	"total": 5,
	"fieldGroups": [
		{
			"id": 6,
			"name": "MZFGB_2",
			"description": "SECOND desc"
		},
		{
			"id": 7,
			"name": "MZFGB_3",
			"description": "hird desc"
		},
		{
			"id": 8,
			"name": "MZFGB_5",
			"description": "fifth"
		},
		{
			"id": 9,
			"name": "MZFGB_10",
			"description": "10 desc text"
		},
		{
			"id": 10,
			"name": "MZFGB_20",
			"description": "my description PATCH of name 20"
		}
	]
}
```

### Create new field group

Request URL:

```
POST - {{ _.MAUTIC_API_URL }}/mz/field-groups
```

Example Request Body:

```
{
	/**
	 * This value should always be true.
	 *
	 * required: yes
	 */
	"isPublished": true, 

	/**
	 * Group string id needs to be unique without spaces all lowercase. 
	 * Its value must not be any of the following: 
	 * [
	 * 		"core", 
	 * 		"social", 
	 *		"presonal", 
	 * 		"professional"
	 * ]
	 * 
	 * required: yes
	 */
	"name": "MZFGB_20",  // required - , for example: "myprofields"

	/**
	 * Field group description.
	 * 
	 * required: no
	 */
	"description": "My pro fields group description"  // optional - field group description
}
```

Example Response:

```
{
	"fieldGroup": {
		"id": 10,
		"name": "MZFGB_20",
		"description": "20 desc text"
	}
}
```

### Update existing field group

Request URL:

```
PATCH - {{ _.MAUTIC_API_URL }}/mz/field-groups
```

Example Request Body:

```
{
	"description": "This is my new description of field group"
}
```

Example Response:

```
{
	"fieldGroup": {
		"id": 10,
		"name": "MZFGB_20",
		"description": "This is my new description of field group"
	}
}
```

### Delete field group

Request URL:

```
DELETE - {{ _.MAUTIC_API_URL }}/mz/field-groups/{{recordId}}
```

Example Response:

```
{
	"fieldGroup": {
		"id": null,
		"name": "MZFGB_1",
		"description": "my description PATCH"
	}
}
```
