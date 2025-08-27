# Support Tickets

A basic support ticket system using Laravel.

## Requirements

1. A login page with database driven authentication.
2. A page with a form to submit support ticket details:
   - Title
   - Description
   - Priority (critical|high|medium|low)
3. A page to list support tickets, with ID, Title, User, Status (open/closed) and date submitted.
4. A page to view full ticket content and allow for updating of the status field.
5. All forms require validation

## ERD

```mermaid
---
title: Ticketing application ER diagram
---
erDiagram
    users {
        bigInt id PK
        text email
        text password_hash
        datetime created_at
        datetime updated_at
    }
    users |o--o{ tickets : allows
    users ||--o{ ticket_priority : owns
    users ||--o{ ticket_status : owns
    tickets {
        bigInt id PK
        text title
        text description
        bigInt priority_id FK
        bigInt status_id FK
        bigInt assignee_id FK
        datetime created_at
        bigInt created_by FK
        datetime updated_at
        bigInt updated_by FK
    }
    ticket_priority ||--o{ tickets : allows
    ticket_status ||--o{ tickets : allows
    ticket_priority {
        bigInt id PK
        text name
        text description
        datetime created_at
        bigInt created_by FK
        datetime updated_at
        bigInt updated_by FK
    }
    ticket_status {
        bigInt id PK
        text name
        text description
        datetime created_at
        bigInt created_by FK
        datetime updated_at
        bigInt updated_by FK
    }
```

