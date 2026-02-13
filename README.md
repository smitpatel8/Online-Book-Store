sequenceDiagram
    participant CRM as Customer CRM
    participant Ingest as Ingestion Service
    participant Model as AI Model (RF)
    participant DB as SkyGeni DB
    participant Slack as Notification System

    Note over CRM, Slack: Nightly Batch Run (2:00 AM)

    Ingest->>CRM: Request "Open Opportunities" (Last 24h)
    CRM-->>Ingest: Returns JSON [Deal A, Deal B...]
    
    loop For Each Deal
        Ingest->>Ingest: Validate Data & Calc Features
        Ingest->>Model: Predict_Proba(Features)
        Model-->>Ingest: Return Risk: 85% (Critical)
        
        Ingest->>DB: Fetch Previous Score
        DB-->>Ingest: Previous Risk: 60%
        
        Note right of Ingest: Risk jumped >15%? YES.
        Ingest->>DB: Save New Score (85%)
    end

    par Parallel Actions
        Ingest->>Slack: 🚨 ALERT: Deal A Spiked to Critical Risk!
        Ingest->>CRM: Update Field "SkyGeni_Score" = 85
    end
