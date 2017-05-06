# envelope.json

Envelope for JSON body - Uses `__desctruct()` call to push the data as JSON in an envelope.

Fields available

 - *status*: boolean
 - *data*: mixed data type


## Usage

Indicate something went wrong. Still we can send some data with error status.

```
    $envelope = new envelope();
    $envelope->not_found($data);
```

Or, indicate something completed successfully.

    $envelope = new envelope();
    $envelope->found($data);
```
