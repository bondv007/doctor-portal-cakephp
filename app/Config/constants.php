<?php
class ConstUserTypes
{
    const Admin = 1;
    const User = 2;
	const Doctor = 3;
	const Clinic = 4;
}
class ConstUserIds
{
    const Admin = 1;
}
class ConstAttachment
{
    const UserAvatar = 1;
	const Photo = 2;
}
class ConstAltVerb
{
    const FirstLeterCaps = 1;
    const PluralCaps = 2;
    const SingularCaps = 3;
    const SingularSmall = 4;
    const PluralSmall = 5;
}
class ConstMoreAction
{
    const Inactive = 1;
    const Active = 2;
    const Delete = 3;
    const Export = 5;
    const Approved = 6;
    const Disapproved = 7;
    const Featured = 8;
    const Notfeatured = 9;
    const Site = 10;
    const Facebook = 12;
    const Suspend = 15;
    const Unsuspend = 16;
    const Normal = 19;
    const Checked = 20;
    const Unchecked = 21;
    const Open = 22;
    const Completed = 23;
    const TestMode = 33;
    const MassPay = 34;
    const Signup = 36;
    const Reject = 38;
    const Cancel = 39;
    const Publish = 40;
    const Unpublish = 41;
    const Promote = 42;
    const Unpromote = 43;
	const Patient = 44;
    const Doctor = 45;
	const Clinic = 46;	
}
// Banned ips types
class ConstBannedTypes
{
    const SingleIPOrHostName = 1;
    const IPRange = 2;
    const RefererBlock = 3;
}
// Banned ips durations
class ConstBannedDurations
{
    const Permanent = 1;
    const Days = 2;
    const Weeks = 3;
}
class ConstGenders
{
    const Male = 1;
    const Female = 2;
}
//payment related class constant
class ConstPaymentGateways
{
    const PayPal = 1;
    const PayPalStandard = 3;
    const ManualPay = 4;
}
class ConstTransactionTypes
{
    const PlanFee = 1;
	const SignupFee = 11;
	const AffliateUserWithdrawalRequest = 30;
    const AffliateAdminApprovedWithdrawalRequest = 31;
    const AffliateAdminRejecetedWithdrawalRequest = 32;
    const AffliateFailedWithdrawalRequest = 33;
    const AffliateAmountRefundedForRejectedWithdrawalRequest = 34;
    const AffliateAmountApprovedForUserCashWithdrawalRequest = 35;
    const AffliateFailedWithdrawalRequestRefundToUser = 36;
	const AffliateAddFundToAffiliate = 37;
    const AffliateAcceptCashWithdrawRequest = 38;
}
class ConstResourceFolderName
{
    const Image = 'image';
}
class ConstModule
{
    const Affiliate = 14;
}
class ConstModuleEnableFields
{
    const Affiliate = 246;
}
class ConstPaymentType
{
    const PlanFee = 1;
}
class ConstRepeatDates
{
    const Sunday = 1;
    const Monday = 2;
    const Tuesday = 3;
    const Wednesday = 4;
    const Thursday = 5;
    const Friday = 6;
    const Saturday = 7;
}
class ConstAppointmentStatus
{
    const PendingApproval = 1;
	const Approved = 2;
    const Closed = 3;
    const Cancelled = 4;
	const Rejected = 5;
	const Expired = 6;
}
class ConstPreferredPhone 
{
    const Cell = 1;
	const Home = 2;
    const Work = 3;
}
class ConstAffiliateCashWithdrawalStatus
{
    const Pending = 1;
    const Approved = 2;
    const Rejected = 3;
    const Failed = 4;
    const Success = 5;
}
class ConstCommsisionType
{
   const Amount = 'amount';
   const Percentage = 'percentage';
}

class ConstAffiliateStatus
{
   const Pending = 1;
   const Canceled = 2;
   const PipeLine = 3;
   const Completed = 4;
}
class ConstAffiliateCommissionType
{
   const Percentage = 1;
   const Amount = 2;
}
class ConstAffiliateRequests
{
   const Pending = 0;
   const Accepted = 1;
   const Rejected = 2;
}
function cmp( $a, $b ) {	  if ( $a['name'] == $b['name'] ) return 0;	  elseif ( $a['name'] > $b['name'] ) return 1;	  elseif ( $a['name'] < $b['name'] ) return -1;	}
?>