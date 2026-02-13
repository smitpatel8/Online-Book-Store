```mermaid
graph TD
    %% Styles
    classDef external fill:#f9f,stroke:#333,stroke-width:2px;
    classDef skygeni fill:#e1f5fe,stroke:#01579b,stroke-width:2px;
    classDef storage fill:#fff9c4,stroke:#fbc02d,stroke-width:2px;
    classDef alert fill:#ffcdd2,stroke:#c62828,stroke-width:2px;
    subgraph "Customer Environment"
        CRM[Customer CRM<br/>(Salesforce / HubSpot)]:::external
        User[Sales Leader<br/>(Slack / Dashboard)]:::external
    end
    subgraph "SkyGeni Cloud (AWS/GCP)"
        direction TB
        Connector[Integration Service]:::skygeni
        Queue[Message Queue]:::storage
        Worker[ETL Worker]:::skygeni
        ModelService[Model Service]:::skygeni
        AppDB[(Operational DB)]:::storage
        AlertEngine[Notification Engine]:::alert
    end
    CRM -- "1. Pull Delta Updates" --> Connector
    Connector --> Queue
    Queue --> Worker
    Worker -- "Fetch Score" --> ModelService
    ModelService --> Worker
    Worker -- "Save Result" --> AppDB
    AppDB -- "Trigger Check" --> AlertEngine
    AlertEngine -- "High Risk Alert" --> User
    AppDB -- "Sync Score" --> CRM
```
