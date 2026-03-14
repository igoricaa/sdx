-- Add email_sent flag to prevent duplicate order confirmation emails
-- Run this migration before deploying the code changes

ALTER TABLE checkout
  ADD COLUMN email_sent TINYINT(1) NOT NULL DEFAULT 0;

ALTER TABLE coinpayments
  ADD COLUMN email_sent TINYINT(1) NOT NULL DEFAULT 0;
