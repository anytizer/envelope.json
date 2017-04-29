# envelope.json

Envelope for JSON body - Uses __desctruct() call to push the data as JSON in an envelope.

Fields available

 - _status_: boolean
 - _data_: mixed data type


## Usage

```
    $data = $expect["data"];

    $envelope = new envelope();
    $envelope->not_found($data);
```
