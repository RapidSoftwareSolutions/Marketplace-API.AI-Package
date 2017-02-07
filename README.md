[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/ApiAI/functions?utm_source=RapidAPIGitHub_APIAIFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)


# Api.ai Package
Send queries to the api.ai platform.
* Domain: api.ai
* Credentials: apiKey

## How to get credentials: 
0. Got to https://console.api.ai 
1. Setting->general, copy access_token.
 
## Api.ai.query
Method description

| Field            | Type  | Description
|------------------|-------|----------
| apiKey           | credentials| Access token obtained from API.AI
| query            | String| Natural language text to be processed. Requests can have multiple 'query' parameters.
| sessionId        | String| A string token up to 36 symbols long, used to identify the client and to manage session parameters (including contexts) per client.
| lang             | String| Language tag, e.g., en, es etc.
| context          | JSON| Optional: Array of additional context objects. Should be sent via a POST /query request. Contexts sent in a query are activated before the query.
| entities         | JSON| Optional: Array of entities that replace developer defined entities for this request only. The entity(ies) need to exist in the developer console. Entities JSON format follows the format used in the /entities endpoint.
| timezone         | String| Optional:Time zone from IANA Time Zone Database
| location         | JSON| Optional: Latitude and longitude values. Example: {"latitude": 37.4256293, "longitude":-122.20539}.
| resetContexts    | String| Optional: If true, all current contexts in a session will be reset before the new ones are set. False by default.

#### Request example
```json
{
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
```

## Api.ai.textToSpeech
Method description

| Field   | Type  | Description
|---------|-------|----------
| apiKey  | credentials| Access token obtained fron API.AI
| text    | String| text
| language| String| A single header value is used to identify TTS language. For example: en-US

#### Request example
```json
{	"apiKey": "...",
	"text": "...",
	"language": "..."
}
```

## Api.ai.getContextx
Method description

| Field    | Type  | Description
|----------|-------|----------
| apiKey   | credentials| Access token obtained fron API.AI
| sessionId| String| Session Id

#### Request example
```json
{	
    "apiKey": "...",
	"sessionId": "..."
}
```

## Api.ai.getContext
Method description

| Field    | Type  | Description
|----------|-------|----------
| apiKey   | credentials| Access token obtained fron API.AI
| sessionId| String| Session Id
| contextName| String| Context name.

#### Request example
```json
{	
    "apiKey": "...",
	"sessionId": "..."
}
```

## Api.ai.addContext
Method description

| Field     | Type  | Description
|-----------|-------|----------
| apiKey    | credentials| Access token obtained fron API.AI.
| sessionId | String| Session Id
| name      | String| Context name.
| lifeSpan  | String| Optinal: Number of requests after which the context will expire.
| parameters| JSON| Optional: Array of parameters used with the action.

#### Request example
```json
{
	"apiKey": "token",
	"sessionId": "1234567890",
	"name": "test",
	"lifeSpan": "3",
	"parameters": {
		"name": "Sam",
		"value": "test"
	}
}
```

## Api.ai.clearContexts
Method description

| Field    | Type  | Description
|----------|-------|----------
| apiKey   | credentials| Access token obtained fron API.AI.
| sessionId| String| Session Id

#### Request example
```json
{	
    "apiKey": "...",
	"sessionId": "..."
}
```

## Api.ai.deleteContext
Method description

| Field      | Type  | Description
|------------|-------|----------
| apiKey     | credentials| Access token obtained fron API.AI.
| sessionId  | String| Session Id
| contextName| String| Context name.

#### Request example
```json
{	
    "apiKey": "...",
	"sessionId": "...",
	"contextName": "..."
}
```

