# Magento 2 Login as Customer Module

This repository contains a **Login as Customer** module that allows authorized Admin users to log in as customers from the Admin Panel with **multi-website support** and full audit traceability.

## Key Features

- **Multi-Website Support** - Login as customer on any website (Ashokdubariya, Coverion, etc.)  
- **Smart Button Detection** - Automatically shows single button or dropdown based on available websites  
- **Grid & Edit Page Access** - Login from customer grid or edit page  
- **Cryptographically Secure** - Token-based authentication with SHA-256 hashing  
- **Complete Audit Trail** - Track every login attempt with full details  
- **ACL Protected** - Granular permission control  
- **One-Time Tokens** - Prevents replay attacks  
- **Configurable Expiry** - Default 5-minute token lifetime

## Security Features

- **Cryptographically Secure Tokens** - Uses `random_bytes(32)` for token generation  
- **SHA-256 Hash Storage** - Tokens stored as hashes, never plaintext  
- **Single-Use Tokens** - Automatically invalidated after first use  
- **Configurable Expiry** - Default 5 minutes, prevents stale tokens  
- **ACL Protected** - Dual permissions for login action and audit access  
- **Complete Audit Trail** - Logs every attempt with admin/customer/IP/timestamp  
- **CSRF Protection** - Leverages Magento's form key validation  
- **No Password Access** - Bypasses password, uses session-based login  
- **IP Tracking** - Records admin IP for forensics  
- **Replay Prevention** - Hash comparison prevents token reuse  

## Requirements

- Magento Open Source **2.4.4+**
- PHP **8.1+**

## Module Information

- **Module Name:** `Ashokdubariya_LoginAsCustomer`
- **Package Name:** `ashokdubariya/module-login-as-customer`
- **Module Type:** Magento 2 Custom Module
- **License:** MIT

## Installation

### Method 1: Composer Installation (Recommended)

```bash
composer require ashokdubariya/module-login-as-customer
php bin/magento module:enable Ashokdubariya_LoginAsCustomer
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```
### Method 2: Manual Installation

1. Copy the module to Magento:

```bash
mkdir -p app/code/Ashokdubariya/LoginAsCustomer
# Copy module files to app/code/Ashokdubariya/LoginAsCustomer
```

2. Run Magento commands:

```bash
php bin/magento module:enable Ashokdubariya_LoginAsCustomer
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
```

## Configuration

Navigate to: **Stores > Configuration > Ashokdubariya > Login as Customer**

### Settings

| Setting | Description | Default |
|---------|-------------|---------|
| **Enable Module** | Enable/Disable functionality | Yes |
| **Token Lifetime (minutes)** | How long token remains valid | 5 |
| **Redirect Page After Login** | URL path after login | `customer/account` |
| **Enable Audit Logging** | Log all attempts | Yes |

## Permissions Setup

### Grant Permissions to Admin Role

1. Navigate to: **System > Permissions > User Roles**
2. Edit the desired role
3. Under **Role Resources**, expand **Customers**
4. Check:
   - **Login as Customer > Perform Login as Customer Action**
   - **Login as Customer > View Audit Log**
5. Under **Stores > Configuration**, check:
   - **Login as Customer Configuration**
6. Save Role

## Usage Guide

### Method 1: From Customer Grid (Quick Access)

**Single Website Customer:**
1. Navigate to: **Customers > All Customers**
2. Locate customer row
3. Click **Select** in Actions dropdown
4. Click **Login as Customer**
5. New window opens with customer logged in

**Multi-Website Customer:**
1. Navigate to: **Customers > All Customers**
2. Locate customer row
3. Click **Select** in Actions dropdown
4. You'll see multiple options:
   - **Login as Customer (Default)**
   - **Login as Customer (Wholesale)**
   - etc.
5. Click the desired website option
6. New window opens with customer logged into that website

### Method 2: From Customer Edit Page

**Single Website Customer:**
1. Navigate to: **Customers > All Customers**
2. Click **Edit** on a customer
3. Click **Login as Customer** button in header
4. New window opens with customer logged in

**Multi-Website Customer:**
1. Navigate to: **Customers > All Customers**
2. Click **Edit** on a customer
3. Click **Login as Customer** dropdown button in header
4. Select the desired website from dropdown:
   - Default
   - Wholesale
   - etc.
5. New window opens with customer logged into selected website

### Website Selection Logic

The module intelligently detects available websites:
- **Global Customer Sharing** (scope = 0): Shows all websites
- **Per-Website Sharing** (scope = 1): Shows only customer's assigned website
- **Single Website**: Simple button/action
- **Multiple Websites**: Dropdown button/multiple actions

### Viewing Audit Log

1. Navigate to: **Customers > Login as Customer**
2. View grid with columns:
   - Log ID
   - Admin ID / Username
   - Customer ID / Email
   - IP Address
   - Status (Pending/Success/Expired/Failed)
   - Store View
   - Created At / Expires At / Used At
3. Use filters to search by admin, customer, status, date range

## Security Considerations

### What We Do

1. **Token Generation:** Cryptographically secure `random_bytes(32)` = 64 hex chars
2. **Token Storage:** Store SHA-256 hash only (64 chars), original token discarded after URL generation
3. **Single-Use:** Token status changed from `pending` → `success` after first use, subsequent attempts rejected
4. **Expiration:** Configurable TTL (default 5 min), server-side timestamp validation
5. **Audit Logging:** Every attempt logged with:
   - Admin ID/username
   - Customer ID/email
   - IP address
   - Timestamp
   - Outcome (success/failed/expired)
6. **ACL Enforcement:** Separate permissions for:
   - Performing login action
   - Viewing audit log
   - Modifying configuration
7. **CSRF Protection:** Magento's built-in form key validation on admin controllers
8. **Session Regeneration:** Customer session ID regenerated after login
9. **No Password Exposure:** Customer password hash never accessed

### What We Don't Do

- No customer password access  
- No plaintext token storage  
- No unlimited token lifetime  
- No token reuse  
- No bypass of ACL permissions  
- No modification of customer data during login  

### Technical Details

1. Detects customer's primary website ID
2. Checks customer sharing configuration
3. Retrieves all accessible websites
4. Generates appropriate UI (single/multiple actions)
5. Passes `website_id` parameter to controller
6. Controller selects correct store based on website
7. Redirects to appropriate website base URL

## Support

- **Source**: [GitHub Repository](https://github.com/ashokdubariya/magento2-login-as-customer)
- **Issues**: [GitHub Issues](https://github.com/ashokdubariya/magento2-login-as-customer/issues)

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.