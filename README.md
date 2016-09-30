# Api.ai Package
Send queries to the api.ai platform.
* Domain: api.ai
* Credentials: apiKey

## How to get credentials: 
0. Got to https://console.api.ai 
1. Setting->general, copy access_token.

## TOC: 
* [query](#query)
* [textToSpeech](#textToSpeech)
* [getContextx](#getContextx)
* [getContext](#getContext)
* [addContext](#addContext)
* [clearContexts](#clearContexts)
* [deleteContext](#deleteContext)
 
<a name="query"/>
## Api.ai.query
Method description

| Field            | Type  | Description
|------------------|-------|----------
| apiKey           | String| Access token obtained from API.AI
| query            | String| Natural language text to be processed. Requests can have multiple 'query' parameters.
| sessionId        | String| A string token up to 36 symbols long, used to identify the client and to manage session parameters (including contexts) per client.
| lang             | String| Language tag, e.g., en, es etc.
| context          | JSON| Optional: Array of additional context objects. Should be sent via a POST /query request. Contexts sent in a query are activated before the query.
| entities         | JSON| Optional: Array of entities that replace developer defined entities for this request only. The entity(ies) need to exist in the developer console. Entities JSON format follows the format used in the /entities endpoint.
| timezone         | String| Optional:Time zone from IANA Time Zone Database
| location         | JSON| Optional: Latitude value.
| resetContexts    | String| Optional: If true, all current contexts in a session will be reset before the new ones are set. False by default.

#### Request example
```json
{
	"args": {
		"apiKey": "token",
		"query": "and for tomorrow",
		"timezone": "GMT-5",
		"lang": "en",
		"contexts": [{
			"name": "weather",
			"parameters": {
				"city": "London"
			},
			"lifespan": 4
		}, {
			"name": "music",
			"parameters": {
				"city": "London",
				"test": "value"
			},
			"lifespan": 4
		}],
		"sessionId": "1234567890"
	}
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":{
                   "id": "9b49f2fb-fdd4-46f1-aa0d-7c4ed2caccdc",
                   "timestamp": "2016-09-08T05:34:23.167Z",
                   "result": {
                     "source": "agent",
                     "resolvedQuery": "my name is Sam and I live in Paris",
                     "action": "",
                     "actionIncomplete": false,
                     "parameters": {
                       "city": "Paris",
                       "user_name": "Sam"
                     },
                     "contexts": [
                       {
                         "name": "greetings",
                         "parameters": {
                           "city": "Paris",
                           "user_name": "Sam",
                           "city.original": "Paris",
                           "user_name.original": "Sam"
                         },
                         "lifespan": 5
                       }
                     ],
                     "metadata": {
                       "intentId": "373a354b-c15a-4a60-ac9d-a9f2aee76cb4",
                       "webhookUsed": "false",
                       "intentName": "greetings"
                     },
                     "fulfillment": {
                       "speech": "Nice to meet you, Sam!"
                     },
                     "score": 1
                   },
                   "status": {
                     "code": 200,
                     "errorType": "success"
                   },
                   "sessionId": "7501656c-b86e-496f-ae03-c2c800b851ff"
                 }
		}
	}
}
```

<a name="textToSpeech"/>
## Api.ai.textToSpeech
Method description

| Field   | Type  | Description
|---------|-------|----------
| apiKey  | String| Access token obtained fron API.AI
| text    | String| text
| language| String| A single header value is used to identify TTS language. For example: en-US

#### Request example
```json
{	"apiKey": "...",
	"text": "...",
	"language": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to": {
                    wav audio file encoded with base64
                  }
		}
	}
}
```

<a name="getContextx"/>
## Api.ai.getContextx
Method description

| Field    | Type  | Description
|----------|-------|----------
| apiKey   | String| Access token obtained fron API.AI
| sessionId| String| Session Id

#### Request example
```json
{	"apiKey": "...",
	"sessionId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":[{
                 	"name": "greetings",
                 	"parameters": {
                 		"name": "Sam"
                 	},
                 	"lifespan": 3
                 }]
		}
	}
}
```

<a name="getContext"/>
## Api.ai.getContext
Method description

| Field    | Type  | Description
|----------|-------|----------
| apiKey   | String| Access token obtained fron API.AI
| sessionId| String| Session Id
| contextName| String| Context name.

#### Request example
```json
{	"apiKey": "...",
	"sessionId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":[{
                 	"name": "greetings",
                 	"parameters": {
                 		"name": "Sam"
                 	},
                 	"lifespan": 3
                 }]
		}
	}
}
```

<a name="addContext"/>
## Api.ai.addContext
Method description

| Field     | Type  | Description
|-----------|-------|----------
| apiKey    | String| Access token obtained fron API.AI.
| sessionId | String| Session Id
| name      | String| Context name.
| lifeSpan  | String| Optinal: Number of requests after which the context will expire.
| parameters| JSON| Optional: Array of parameters used with the action.

#### Request example
```json
{
	"args": {
		"apiKey": "token",
		"sessionId": "1234567890",
		"name": "test",
		"lifeSpan": "3",
		"parameters": {
			"name": "Sam",
			"value": "test"
		}
	}
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":{
                 	"names": [
                 		"greetings"
                 	],
                 	"status": {
                 		"code": 200,
                 		"errorType": "success"
                 	}
                 }
		}
	}
}
```

<a name="clearContexts"/>
## Api.ai.clearContexts
Method description

| Field    | Type  | Description
|----------|-------|----------
| apiKey   | String| Access token obtained fron API.AI.
| sessionId| String| Session Id

#### Request example
```json
{	"apiKey": "...",
	"sessionId": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":{
                 	"names": [
                 			"greetings"
                 		]
                 		...,
                 	"status": {
                 		"code": 200,
                 		"errorType": "success"
                 	}
                 }
		}
	}
}
```

<a name="deleteContext"/>
## Api.ai.deleteContext
Method description

| Field      | Type  | Description
|------------|-------|----------
| apiKey     | String| Access token obtained fron API.AI.
| sessionId  | String| Session Id
| contextName| String| Context name.

#### Request example
```json
{	"apiKey": "...",
	"sessionId": "...",
	"contextName": "..."
}
```
#### Response example
```json
{
	"callback":"success",
	"contextWrites":{
		"#":{
			"to":{
                 	"names": [
                 		"greetings"
                 	],
                 	"status": {
                 		"code": 200,
                 		"errorType": "success"
                 	}
                 }
		}
	}
}
```

