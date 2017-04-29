# envelope.json

Envelope for JSON body - Uses __desctruct() call to push the data as JSON in an envelope.

Fields available

 - _status_: boolean
 - _data_: mixed data type


## Usage

Indicate something went wrong.

```
    $data = $mixed_output; // Your data

    $envelope = new envelope();
    $envelope->not_found($data);
```

Or, indicate something was successful.

```
    $data = $mixed_output; // Your data

    $envelope = new envelope();
    $envelope->found($data);
```
