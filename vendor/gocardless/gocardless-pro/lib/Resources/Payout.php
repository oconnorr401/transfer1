<?php
/**
 * WARNING: Do not edit by hand, this file was generated by Crank:
 *
 * https://github.com/gocardless/crank
 */

namespace GoCardlessPro\Resources;

/**
 * A thin wrapper around a payout, providing access to its
 * attributes
 *
 * @property-read $amount
 * @property-read $arrival_date
 * @property-read $created_at
 * @property-read $currency
 * @property-read $deducted_fees
 * @property-read $id
 * @property-read $links
 * @property-read $payout_type
 * @property-read $reference
 * @property-read $status
 */
class Payout extends BaseResource
{
    protected $model_name = "Payout";

    /**
     * Amount in pence or cents.
     */
    protected $amount;

    /**
     * Date the payout is due to arrive in the creditor's bank account.
     * One of:
     * <ul>
     *   <li>`yyyy-mm-dd`: the payout has been paid and is due to arrive in the
     * creditor's bank
     *   account on this day</li>
     *   <li>`null`: the payout hasn't been paid yet</li>
     * </ul>
     */
    protected $arrival_date;

    /**
     * Fixed [timestamp](#api-usage-time-zones--dates), recording when this
     * resource was created.
     */
    protected $created_at;

    /**
     * [ISO 4217](http://en.wikipedia.org/wiki/ISO_4217#Active_codes) currency
     * code. Currently only "GBP", "EUR", and "SEK" are supported.
     */
    protected $currency;

    /**
     * Fees that have already been deducted from the payout amount in pence or
     * cents.
     * 
     * For each `late_failure_settled` or `chargeback_settled` action, we refund
     * the transaction fees in a payout. This means that a payout can have a
     * negative `deducted_fees`. This field is calculated as `GoCardless fees +
     * app fees - refunded fees`
     * 
     * If the merchant is invoiced for fees separately from the payout, then
     * `deducted_fees` will be 0.
     */
    protected $deducted_fees;

    /**
     * Unique identifier, beginning with "PO".
     */
    protected $id;

    /**
     * 
     */
    protected $links;

    /**
     * Whether a payout contains merchant revenue or partner fees.
     */
    protected $payout_type;

    /**
     * Reference which appears on the creditor's bank statement.
     */
    protected $reference;

    /**
     * One of:
     * <ul>
     * <li>`pending`: the payout has been created, but not yet sent to the
     * banks</li>
     * <li>`paid`: the payout has been sent to the banks</li>
     * </ul>
     */
    protected $status;

}