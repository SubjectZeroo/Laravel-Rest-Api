# Laravel Rest API ejercicio simple

A continuación, tenemos una secuencia de solicitudes que se utilizarán para probar la API.

## Resetear estado despues de empezar los tests

```
POST /reset

200 OK
```


## Obtener balance para cuenta no existente

```
GET /balance?account_id=1234

404 0
```

## Crear cuenta con un balance inicial

```
POST /event {"type":"deposit", "destination":"100", "amount":10}

201 {"destination": {"id":"100", "balance":10}}
```

## Deposito en una cuenta existente

```
POST /event {"type":"deposit", "destination":"100", "amount":10}

201 {"destination": {"id":"100", "balance":20}}
```

## Obtener balance de una cuenta existente

```
GET /balance?account_id=100

200 20
```

## Retiro de una cuenta no existente

```
POST /event {"type":"withdraw", "origin":"200", "amount":10}

404 0
```

## Retiro de una cuenta existente 

```
POST /event {"type":"withdraw", "origin":"100", "amount":5}

201 {"origin": {"id":"100", "balance":15}}
```

## Transferencia de una cuenta existente

```
POST /event {"type":"transfer", "origin":"100", "amount":15, "destination":"300"}

201 {"origin": {"id":"100", "balance":0}, "destination": {"id":"300", "balance":15}}
```

## Transferencia de una cuenta no existente

```
POST /event {"type":"transfer", "origin":"200", "amount":15, "destination":"300"}

404 0
```
