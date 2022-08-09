# GoldCoast SISPAQ Platform

It was developed with QCubed, an excellent (unfortunately almost unknown) framework for PHP
The database is MySQL 5.7
This solution works in USA and Venezuela.

This project includes:
- OPS Control System
- Retail Solution 
- Corporative Connect System
- Mobile Driver's Solution
- Import and Export Modules

## OPS Control System: The core Platform part which allows controlling of the whole company's operation
- Allows User register, Rol assignment, Permissions Control
- Allows Airway Bills (awbs) creation.  Prints Awbs PDF format and labels with barcode and QR code.
- Registers the first checkpoint automatically for every shipment.
- Allows Awbs Manifest creation in order to do nationwide distribution.
- Registers every shipment movement allowing Customers to track them.
- Registers User Audit on every important transaction.
- Prints Control Shipment Reports over every operation phase.
- Allows leftover and missing shipments detection.
- Prints deliver statistics report

## Retail Solution: Used in Counters nationwide
- Allows Airway Bills (awbs) creation.  Prints Awbs PDF format and labels with barcode and QR code.
- Registers the first checkpoint in the database.
- Allows collecting money and billing shipments.
- Prints cash flow reports.
- Allows register delivered shipment information.

## Corporative Connect System: Used by big and important Company's Customers
- Allows load shipment manifests.
- Allows track shipments distribution status.
- Prints shipment Manifests.

## Mobile Driver's Solution: Used by Drivers during shipment distribution and delivery.
- Allows register delivery and incidents information reducing entry data times

## Import and Export Modules: 
- Allows load shipment manifests.
- Allows creation of export manifests.