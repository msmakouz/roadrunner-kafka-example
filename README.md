# Example project

## Installation

1. Clone this project
2. Install dependencies

```bash
composer install
```

3. Install and run Kafka

```bash
docker-compose -f docker-compose.yaml pull
docker-compose -f docker-compose.yaml build
docker-compose -f docker-compose.yaml up -d
```

4. Install RoadRunner

```bash
php .\vendor\bin\rr get
```

## Usage

1. Run RoadRunner

```bash
./rr serve
```

2. Send test job

```bash
php client.php
```

Example output:

```bash
Job ID: e9554f01-5691-4796-8265-d733a2a06a64
```

Open RoadRunner logs:

```bash
2022-08-10T17:13:48.071+0300    DEBUG   jobs            job processing was started      {"ID": "e9554f01-5691-4796-8265-d733a2a06a64", "start": "2022-08-10T17:13:45.578+0300", "elapsed": "2.4924312s"}
2022-08-10T17:13:48.090+0300    INFO    server          "Received task with payload:"

2022-08-10T17:13:48.090+0300    INFO    server          array:1 [
  "foo" => "bar"
]

2022-08-10T17:13:48.091+0300    DEBUG   jobs            job was processed successfully  {"ID": "e9554f01-5691-4796-8265-d733a2a06a64", "start": "2022-08-10T17:13:45.578+0300", "elapsed": "2.5126054s"}
```
