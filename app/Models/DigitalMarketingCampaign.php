<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalMarketingCampaign extends Model
{
    protected $fillable = [
        'category', 'srNo', 'closerMonth', 'closerDate', 'clientName', 'projectName',
        'businessCategory', 'domainName', 'professionalEmailID', 'noOfEmailID', 'server',
        'clientMob', 'clientGmailID', 'altEmailID', 'clientLocation', 'clientDOB',
        'campaign', 'bdm', 'project', 'postingFrequency', 'totalPost', 'mailID',
        'clientNumber', 'projectLead', 'ads', 'startingMonth', 'billingDate',
        'projectStartingDt', 'projectClosingDt', 'remark', 'clientCharges',
        'initialPayment', 'secondPayment', 'remainingPayment', 'projectStatus',
        'clientNo', 'mailID2'
    ];
}