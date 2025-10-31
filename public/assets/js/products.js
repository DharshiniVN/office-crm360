/* Category cards and counts for Products module */
const productCategories = [
  {key:'school_management', label:'School Management Software', icon:'🏫'},
  {key:'billing', label:'Billing Software', icon:'💳'},
  {key:'whatsapp_api', label:'WhatsApp Meta API', icon:'💬'},
  {key:'digital_visiting_card', label:'Digital Visiting Card', icon:'📇'},
  {key:'brand_bizz', label:'Brand Bizz', icon:'🏢'},
  {key:'cloud_india_hub', label:'Cloud India Hub', icon:'☁️'},
];

// Sample data for Products module
window.sampleProductsData = [
  {
    closerYear:2024, closerDate:'2024-01-15', clientName:'ABC School', clientMob:'9876543210',
    clientGmailID:'abc.school@gmail.com', projectName:'School Management System', domainName:'abcschool.com',
    domainBookingPlace:'godaddy', domainBookingDate:'2024-01-10', domainBookingYear:2024,
    professionalGsuitEmailID:'admin@abcschool.com', noOfEmailID:10, altEmailID:'info@abcschool.com',
    server:'vps', clientLocation:'Mumbai', state:'Maharashtra', country:'India', clientDOB:'1980-05-15',
    campaign:'Education Software', bdm:'Raj Sharma', frontendDeveloper:'Amit Kumar', backendDeveloper:'Priya Singh',
    projectStartDate:'2024-01-01', projectDeadline:'2024-03-31', demoDate:'2024-02-15', projectCloserDate:'2024-03-20',
    finalStatus:'Completed', projectCost:50000, withGST:59000, serverCost:5000, emailCost:2000,
    initialPayment:20000, secondPayment:20000, remPayment:19000, pendingPayment:0,
    remark:'System implemented successfully', projectStatus:'Completed', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'January', renewalDate:'2025-01-15', renewalItems:'Software License, Support',
    renewalAmount:10000, renewalRemark:'Annual maintenance contract', category:'school_management'
  },
  {
    closerYear:2024, closerDate:'2024-02-10', clientName:'Retail Store', clientMob:'8765432109',
    clientGmailID:'retail.store@gmail.com', projectName:'Billing Software', domainName:'retailstore.com',
    domainBookingPlace:'cloudindia', domainBookingDate:'2024-02-05', domainBookingYear:2024,
    professionalGsuitEmailID:'billing@retailstore.com', noOfEmailID:5, altEmailID:'sales@retailstore.com',
    server:'shared', clientLocation:'Delhi', state:'Delhi', country:'India', clientDOB:'1975-08-20',
    campaign:'Retail Automation', bdm:'Neha Gupta', frontendDeveloper:'Sandeep Roy', backendDeveloper:'Vikram Patel',
    projectStartDate:'2024-02-01', projectDeadline:'2024-04-30', demoDate:'2024-03-10', projectCloserDate:'2024-04-15',
    finalStatus:'Completed', projectCost:30000, withGST:35400, serverCost:3000, emailCost:1000,
    initialPayment:15000, secondPayment:12000, remPayment:8400, pendingPayment:0,
    remark:'POS system integrated', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'February', renewalDate:'2025-02-10', renewalItems:'Software Updates, Support',
    renewalAmount:6000, renewalRemark:'Standard maintenance', category:'billing'
  },
  {
    closerYear:2024, closerDate:'2024-03-05', clientName:'Tech Solutions', clientMob:'7654321098',
    clientGmailID:'tech.solutions@gmail.com', projectName:'WhatsApp Business API', domainName:'techsolutions.in',
    domainBookingPlace:'namecheap', domainBookingDate:'2024-03-01', domainBookingYear:2024,
    professionalGsuitEmailID:'support@techsolutions.in', noOfEmailID:8, altEmailID:'contact@techsolutions.in',
    server:'cloud', clientLocation:'Bangalore', state:'Karnataka', country:'India', clientDOB:'1988-12-10',
    campaign:'Business Automation', bdm:'Arun Kumar', frontendDeveloper:'Meera Nair', backendDeveloper:'Karthik Rao',
    projectStartDate:'2024-03-01', projectDeadline:'2024-05-31', demoDate:'2024-04-15', projectCloserDate:'2024-05-20',
    finalStatus:'In Progress', projectCost:40000, withGST:47200, serverCost:4000, emailCost:1500,
    initialPayment:20000, secondPayment:15000, remPayment:12200, pendingPayment:12200,
    remark:'API integration in progress', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'March', renewalDate:'2025-03-05', renewalItems:'API License, Support',
    renewalAmount:8000, renewalRemark:'Annual subscription', category:'whatsapp_api'
  },
  {
    closerYear:2024, closerDate:'2024-04-01', clientName:'Business Corp', clientMob:'6543210987',
    clientGmailID:'business.corp@gmail.com', projectName:'Digital Visiting Card', domainName:'businesscorp.in',
    domainBookingPlace:'godaddy', domainBookingDate:'2024-03-25', domainBookingYear:2024,
    professionalGsuitEmailID:'contact@businesscorp.in', noOfEmailID:3, altEmailID:'sales@businesscorp.in',
    server:'shared', clientLocation:'Pune', state:'Maharashtra', country:'India', clientDOB:'1985-06-15',
    campaign:'Digital Marketing', bdm:'Kiran Patel', frontendDeveloper:'Riya Sharma', backendDeveloper:'Deepak Jain',
    projectStartDate:'2024-04-01', projectDeadline:'2024-06-30', demoDate:'2024-05-10', projectCloserDate:'2024-06-15',
    finalStatus:'Completed', projectCost:15000, withGST:17700, serverCost:2000, emailCost:500,
    initialPayment:8000, secondPayment:5000, remPayment:4700, pendingPayment:0,
    remark:'Digital card created successfully', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'April', renewalDate:'2025-04-01', renewalItems:'Hosting, Updates',
    renewalAmount:3000, renewalRemark:'Annual hosting renewal', category:'digital_visiting_card'
  },
  {
    closerYear:2024, closerDate:'2024-05-10', clientName:'Brand Solutions', clientMob:'5432109876',
    clientGmailID:'brand.solutions@gmail.com', projectName:'Brand Bizz Platform', domainName:'brandsolutions.co',
    domainBookingPlace:'cloudindia', domainBookingDate:'2024-05-05', domainBookingYear:2024,
    professionalGsuitEmailID:'admin@brandsolutions.co', noOfEmailID:12, altEmailID:'support@brandsolutions.co',
    server:'vps', clientLocation:'Chennai', state:'Tamil Nadu', country:'India', clientDOB:'1978-09-22',
    campaign:'Brand Management', bdm:'Anita Rao', frontendDeveloper:'Vivek Kumar', backendDeveloper:'Sneha Gupta',
    projectStartDate:'2024-05-01', projectDeadline:'2024-08-31', demoDate:'2024-06-20', projectCloserDate:'2024-08-10',
    finalStatus:'In Progress', projectCost:75000, withGST:88500, serverCost:8000, emailCost:3000,
    initialPayment:30000, secondPayment:25000, remPayment:33500, pendingPayment:33500,
    remark:'Platform development in progress', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'May', renewalDate:'2025-05-10', renewalItems:'Platform License, Support',
    renewalAmount:15000, renewalRemark:'Annual platform renewal', category:'brand_bizz'
  },
  {
    closerYear:2024, closerDate:'2024-06-15', clientName:'Cloud Services', clientMob:'4321098765',
    clientGmailID:'cloud.services@gmail.com', projectName:'Cloud India Hub', domainName:'cloudindiahub.com',
    domainBookingPlace:'namecheap', domainBookingDate:'2024-06-10', domainBookingYear:2024,
    professionalGsuitEmailID:'info@cloudindiahub.com', noOfEmailID:15, altEmailID:'sales@cloudindiahub.com',
    server:'dedicated', clientLocation:'Hyderabad', state:'Telangana', country:'India', clientDOB:'1982-11-30',
    campaign:'Cloud Solutions', bdm:'Rajesh Verma', frontendDeveloper:'Priya Nair', backendDeveloper:'Arjun Reddy',
    projectStartDate:'2024-06-01', projectDeadline:'2024-09-30', demoDate:'2024-07-25', projectCloserDate:'2024-09-15',
    finalStatus:'Completed', projectCost:100000, withGST:118000, serverCost:15000, emailCost:4000,
    initialPayment:40000, secondPayment:30000, remPayment:48000, pendingPayment:0,
    remark:'Cloud platform deployed successfully', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'June', renewalDate:'2025-06-15', renewalItems:'Cloud Hosting, Support',
    renewalAmount:20000, renewalRemark:'Annual cloud hosting renewal', category:'cloud_india_hub'
  },
  {
    closerYear:2024, closerDate:'2024-07-20', clientName:'EduTech Solutions', clientMob:'5432109876',
    clientGmailID:'edutech@gmail.com', projectName:'Learning Management System', domainName:'edutechlearn.com',
    domainBookingPlace:'godaddy', domainBookingDate:'2024-07-15', domainBookingYear:2024,
    professionalGsuitEmailID:'admin@edutechlearn.com', noOfEmailID:20, altEmailID:'support@edutechlearn.com',
    server:'vps', clientLocation:'Bangalore', state:'Karnataka', country:'India', clientDOB:'1985-03-15',
    campaign:'Education Technology', bdm:'Anita Sharma', frontendDeveloper:'Rahul Kumar', backendDeveloper:'Sneha Patel',
    projectStartDate:'2024-07-01', projectDeadline:'2024-10-31', demoDate:'2024-08-15', projectCloserDate:'2024-10-20',
    finalStatus:'In Progress', projectCost:85000, withGST:100300, serverCost:12000, emailCost:5000,
    initialPayment:35000, secondPayment:30000, remPayment:35300, pendingPayment:35300,
    remark:'LMS development in progress', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'July', renewalDate:'2025-07-20', renewalItems:'Platform License, Training',
    renewalAmount:18000, renewalRemark:'Annual LMS renewal', category:'school_management'
  },
  {
    closerYear:2024, closerDate:'2024-08-10', clientName:'RetailPro Systems', clientMob:'6543210987',
    clientGmailID:'retailpro@gmail.com', projectName:'Advanced POS System', domainName:'retailpro.in',
    domainBookingPlace:'cloudindia', domainBookingDate:'2024-08-05', domainBookingYear:2024,
    professionalGsuitEmailID:'manager@retailpro.in', noOfEmailID:8, altEmailID:'billing@retailpro.in',
    server:'shared', clientLocation:'Mumbai', state:'Maharashtra', country:'India', clientDOB:'1978-09-22',
    campaign:'Retail Automation', bdm:'Vikram Singh', frontendDeveloper:'Meera Joshi', backendDeveloper:'Karan Mehta',
    projectStartDate:'2024-08-01', projectDeadline:'2024-11-30', demoDate:'2024-09-10', projectCloserDate:'2024-11-15',
    finalStatus:'Completed', projectCost:45000, withGST:53100, serverCost:6000, emailCost:2000,
    initialPayment:20000, secondPayment:18000, remPayment:15100, pendingPayment:0,
    remark:'POS system with inventory management', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'August', renewalDate:'2025-08-10', renewalItems:'Software Updates, Support',
    renewalAmount:9000, renewalRemark:'Annual POS maintenance', category:'billing'
  },
  {
    closerYear:2024, closerDate:'2024-09-05', clientName:'WhatsApp Biz Pro', clientMob:'7654321098',
    clientGmailID:'whatsappbiz@gmail.com', projectName:'WhatsApp Business Integration', domainName:'whatsappbizpro.com',
    domainBookingPlace:'namecheap', domainBookingDate:'2024-09-01', domainBookingYear:2024,
    professionalGsuitEmailID:'tech@whatsappbizpro.com', noOfEmailID:12, altEmailID:'sales@whatsappbizpro.com',
    server:'cloud', clientLocation:'Delhi', state:'Delhi', country:'India', clientDOB:'1989-12-08',
    campaign:'Business Communication', bdm:'Priya Gupta', frontendDeveloper:'Arun Kumar', backendDeveloper:'Divya Sharma',
    projectStartDate:'2024-09-01', projectDeadline:'2024-12-31', demoDate:'2024-10-15', projectCloserDate:'2024-12-20',
    finalStatus:'In Progress', projectCost:65000, withGST:76700, serverCost:8000, emailCost:3000,
    initialPayment:28000, secondPayment:25000, remPayment:23700, pendingPayment:23700,
    remark:'WhatsApp API integration ongoing', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'September', renewalDate:'2025-09-05', renewalItems:'API License, Support',
    renewalAmount:13000, renewalRemark:'Annual API subscription', category:'whatsapp_api'
  },
  {
    closerYear:2024, closerDate:'2024-10-12', clientName:'CardMaster Pro', clientMob:'8765432109',
    clientGmailID:'cardmasterpro@gmail.com', projectName:'Premium Digital Cards', domainName:'cardmasterpro.in',
    domainBookingPlace:'godaddy', domainBookingDate:'2024-10-08', domainBookingYear:2024,
    professionalGsuitEmailID:'premium@cardmasterpro.in', noOfEmailID:6, altEmailID:'contact@cardmasterpro.in',
    server:'shared', clientLocation:'Pune', state:'Maharashtra', country:'India', clientDOB:'1984-05-18',
    campaign:'Digital Branding', bdm:'Rajesh Kumar', frontendDeveloper:'Kavita Singh', backendDeveloper:'Deepak Sharma',
    projectStartDate:'2024-10-01', projectDeadline:'2025-01-31', demoDate:'2024-11-15', projectCloserDate:'2025-01-10',
    finalStatus:'Completed', projectCost:25000, withGST:29500, serverCost:3500, emailCost:1000,
    initialPayment:12000, secondPayment:10000, remPayment:7500, pendingPayment:0,
    remark:'Premium digital cards created', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'October', renewalDate:'2025-10-12', renewalItems:'Hosting, Updates',
    renewalAmount:5000, renewalRemark:'Annual premium renewal', category:'digital_visiting_card'
  },
  {
    closerYear:2024, closerDate:'2024-11-18', clientName:'BrandHub Plus', clientMob:'9876543211',
    clientGmailID:'brandhubplus@gmail.com', projectName:'Brand Management Suite', domainName:'brandhubplus.co',
    domainBookingPlace:'cloudindia', domainBookingDate:'2024-11-12', domainBookingYear:2024,
    professionalGsuitEmailID:'suite@brandhubplus.co', noOfEmailID:18, altEmailID:'analytics@brandhubplus.co',
    server:'vps', clientLocation:'Chennai', state:'Tamil Nadu', country:'India', clientDOB:'1979-08-25',
    campaign:'Brand Analytics', bdm:'Sunita Patel', frontendDeveloper:'Rahul Jain', backendDeveloper:'Poonam Gupta',
    projectStartDate:'2024-11-01', projectDeadline:'2025-03-31', demoDate:'2024-12-20', projectCloserDate:'2025-03-15',
    finalStatus:'In Progress', projectCost:110000, withGST:129800, serverCost:15000, emailCost:6000,
    initialPayment:45000, secondPayment:38000, remPayment:46800, pendingPayment:46800,
    remark:'Brand suite development ongoing', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'November', renewalDate:'2025-11-18', renewalItems:'Suite License, Support',
    renewalAmount:22000, renewalRemark:'Annual suite renewal', category:'brand_bizz'
  },
  {
    closerYear:2024, closerDate:'2024-12-22', clientName:'CloudPro Hub', clientMob:'8765432110',
    clientGmailID:'cloudprohub@gmail.com', projectName:'Cloud Professional Hub', domainName:'cloudprohub.com',
    domainBookingPlace:'namecheap', domainBookingDate:'2024-12-18', domainBookingYear:2024,
    professionalGsuitEmailID:'pro@cloudprohub.com', noOfEmailID:25, altEmailID:'enterprise@cloudprohub.com',
    server:'dedicated', clientLocation:'Hyderabad', state:'Telangana', country:'India', clientDOB:'1981-11-12',
    campaign:'Enterprise Cloud', bdm:'Rajesh Verma', frontendDeveloper:'Priya Nair', backendDeveloper:'Arjun Reddy',
    projectStartDate:'2024-12-01', projectDeadline:'2025-04-30', demoDate:'2025-01-25', projectCloserDate:'2025-04-10',
    finalStatus:'Completed', projectCost:180000, withGST:212400, serverCost:30000, emailCost:8000,
    initialPayment:72000, secondPayment:54000, remPayment:86400, pendingPayment:0,
    remark:'Enterprise cloud hub deployed', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'December', renewalDate:'2025-12-22', renewalItems:'Enterprise Hosting, Support',
    renewalAmount:36000, renewalRemark:'Annual enterprise renewal', category:'cloud_india_hub'
  },
  {
    closerYear:2025, closerDate:'2025-01-08', clientName:'EduSmart Academy', clientMob:'7654321109',
    clientGmailID:'edusmart@gmail.com', projectName:'Smart Academy Platform', domainName:'edusmartacademy.in',
    domainBookingPlace:'godaddy', domainBookingDate:'2025-01-03', domainBookingYear:2025,
    professionalGsuitEmailID:'academy@edusmartacademy.in', noOfEmailID:15, altEmailID:'admissions@edusmartacademy.in',
    server:'vps', clientLocation:'Bangalore', state:'Karnataka', country:'India', clientDOB:'1986-04-20',
    campaign:'Smart Education', bdm:'Anjali Sharma', frontendDeveloper:'Rohit Gupta', backendDeveloper:'Priya Jain',
    projectStartDate:'2025-01-01', projectDeadline:'2025-05-31', demoDate:'2025-02-15', projectCloserDate:'2025-05-05',
    finalStatus:'Completed', projectCost:70000, withGST:82600, serverCost:10000, emailCost:3500,
    initialPayment:28000, secondPayment:24000, remPayment:30600, pendingPayment:0,
    remark:'Smart academy platform launched', projectStatus:'Completed', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'January', renewalDate:'2026-01-08', renewalItems:'Platform Maintenance, Updates',
    renewalAmount:14000, renewalRemark:'Annual academy maintenance', category:'school_management'
  },
  {
    closerYear:2025, closerDate:'2025-02-12', clientName:'BillEase Solutions', clientMob:'6543211098',
    clientGmailID:'billease@gmail.com', projectName:'Billing Ease Software', domainName:'billease.com',
    domainBookingPlace:'cloudindia', domainBookingDate:'2025-02-08', domainBookingYear:2025,
    professionalGsuitEmailID:'ease@billease.com', noOfEmailID:10, altEmailID:'support@billease.com',
    server:'shared', clientLocation:'Delhi', state:'Delhi', country:'India', clientDOB:'1983-07-14',
    campaign:'Easy Billing', bdm:'Sandeep Kumar', frontendDeveloper:'Kiran Rao', backendDeveloper:'Lata Singh',
    projectStartDate:'2025-02-01', projectDeadline:'2025-06-30', demoDate:'2025-03-20', projectCloserDate:'2025-06-05',
    finalStatus:'Completed', projectCost:35000, withGST:41300, serverCost:4000, emailCost:1500,
    initialPayment:15000, secondPayment:12000, remPayment:14300, pendingPayment:0,
    remark:'Billing ease software operational', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'February', renewalDate:'2026-02-12', renewalItems:'Software Updates, Support',
    renewalAmount:7000, renewalRemark:'Annual billing renewal', category:'billing'
  },
  {
    closerYear:2025, closerDate:'2025-03-16', clientName:'WhatsApp Connect', clientMob:'5432110987',
    clientGmailID:'whatsappconnect@gmail.com', projectName:'WhatsApp Connect API', domainName:'whatsappconnect.in',
    domainBookingPlace:'namecheap', domainBookingDate:'2025-03-12', domainBookingYear:2025,
    professionalGsuitEmailID:'connect@whatsappconnect.in', noOfEmailID:14, altEmailID:'api@whatsappconnect.in',
    server:'cloud', clientLocation:'Mumbai', state:'Maharashtra', country:'India', clientDOB:'1991-09-28',
    campaign:'API Integration', bdm:'Ravi Shankar', frontendDeveloper:'Divya Nair', backendDeveloper:'Karthik Raja',
    projectStartDate:'2025-03-01', projectDeadline:'2025-07-31', demoDate:'2025-04-25', projectCloserDate:'2025-07-10',
    finalStatus:'In Progress', projectCost:55000, withGST:64900, serverCost:7000, emailCost:2800,
    initialPayment:25000, secondPayment:20000, remPayment:19900, pendingPayment:19900,
    remark:'WhatsApp connect API in development', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'March', renewalDate:'2026-03-16', renewalItems:'API License, Support',
    renewalAmount:11000, renewalRemark:'Annual connect renewal', category:'whatsapp_api'
  },
  {
    closerYear:2025, closerDate:'2025-04-20', clientName:'VCard Elite', clientMob:'4321110987',
    clientGmailID:'vcardelite@gmail.com', projectName:'Elite Digital Cards', domainName:'vcardelite.co',
    domainBookingPlace:'godaddy', domainBookingDate:'2025-04-16', domainBookingYear:2025,
    professionalGsuitEmailID:'elite@vcardelite.co', noOfEmailID:7, altEmailID:'premium@vcardelite.co',
    server:'shared', clientLocation:'Pune', state:'Maharashtra', country:'India', clientDOB:'1988-12-05',
    campaign:'Elite Branding', bdm:'Meera Iyer', frontendDeveloper:'Arun Kumar', backendDeveloper:'Shweta Patel',
    projectStartDate:'2025-04-01', projectDeadline:'2025-08-31', demoDate:'2025-05-30', projectCloserDate:'2025-08-10',
    finalStatus:'Completed', projectCost:30000, withGST:35400, serverCost:4000, emailCost:1200,
    initialPayment:14000, secondPayment:11000, remPayment:10400, pendingPayment:0,
    remark:'Elite digital cards launched', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'April', renewalDate:'2026-04-20', renewalItems:'Elite Hosting, Updates',
    renewalAmount:6000, renewalRemark:'Annual elite renewal', category:'digital_visiting_card'
  },
  {
    closerYear:2025, closerDate:'2025-05-25', clientName:'BrandPro Suite', clientMob:'3211110987',
    clientGmailID:'brandpro@gmail.com', projectName:'Brand Professional Suite', domainName:'brandpro.in',
    domainBookingPlace:'cloudindia', domainBookingDate:'2025-05-21', domainBookingYear:2025,
    professionalGsuitEmailID:'pro@brandpro.in', noOfEmailID:22, altEmailID:'professional@brandpro.in',
    server:'vps', clientLocation:'Chennai', state:'Tamil Nadu', country:'India', clientDOB:'1980-02-18',
    campaign:'Professional Branding', bdm:'Vivek Sharma', frontendDeveloper:'Neha Gupta', backendDeveloper:'Raj Singh',
    projectStartDate:'2025-05-01', projectDeadline:'2025-09-30', demoDate:'2025-06-30', projectCloserDate:'2025-09-10',
    finalStatus:'In Progress', projectCost:130000, withGST:153400, serverCost:18000, emailCost:7000,
    initialPayment:52000, secondPayment:44000, remPayment:57400, pendingPayment:57400,
    remark:'Professional suite in development', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Pending', renewalMonth:'May', renewalDate:'2026-05-25', renewalItems:'Professional License, Support',
    renewalAmount:26000, renewalRemark:'Annual professional renewal', category:'brand_bizz'
  },
  {
    closerYear:2025, closerDate:'2025-06-28', clientName:'CloudElite Hub', clientMob:'2111110987',
    clientGmailID:'cloudelite@gmail.com', projectName:'Cloud Elite Hub', domainName:'cloudelite.com',
    domainBookingPlace:'namecheap', domainBookingDate:'2025-06-24', domainBookingYear:2025,
    professionalGsuitEmailID:'elite@cloudelite.com', noOfEmailID:30, altEmailID:'premium@cloudelite.com',
    server:'dedicated', clientLocation:'Bangalore', state:'Karnataka', country:'India', clientDOB:'1975-06-30',
    campaign:'Elite Cloud', bdm:'Anand Rao', frontendDeveloper:'Lakshmi Iyer', backendDeveloper:'Mohan Kumar',
    projectStartDate:'2025-06-01', projectDeadline:'2025-10-31', demoDate:'2025-07-20', projectCloserDate:'2025-10-05',
    finalStatus:'Completed', projectCost:220000, withGST:259600, serverCost:40000, emailCost:10000,
    initialPayment:88000, secondPayment:66000, remPayment:105600, pendingPayment:0,
    remark:'Elite cloud hub deployed', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'June', renewalDate:'2026-06-28', renewalItems:'Elite Hosting, Support',
    renewalAmount:44000, renewalRemark:'Annual elite renewal', category:'cloud_india_hub'
  },
  {
    closerYear:2025, closerDate:'2025-07-10', clientName:'EduPro Max', clientMob:'1111110987',
    clientGmailID:'edupromax@gmail.com', projectName:'Educational Pro Max', domainName:'edupromax.in',
    domainBookingPlace:'godaddy', domainBookingDate:'2025-07-06', domainBookingYear:2025,
    professionalGsuitEmailID:'max@edupromax.in', noOfEmailID:18, altEmailID:'pro@edupromax.in',
    server:'vps', clientLocation:'Delhi', state:'Delhi', country:'India', clientDOB:'1987-10-22',
    campaign:'Pro Education', bdm:'Kavita Singh', frontendDeveloper:'Amit Kumar', backendDeveloper:'Rina Patel',
    projectStartDate:'2025-07-01', projectDeadline:'2025-11-30', demoDate:'2025-08-15', projectCloserDate:'2025-11-05',
    finalStatus:'Completed', projectCost:80000, withGST:94400, serverCost:12000, emailCost:4500,
    initialPayment:32000, secondPayment:28000, remPayment:34400, pendingPayment:0,
    remark:'Pro max education system launched', projectStatus:'Completed', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'July', renewalDate:'2026-07-10', renewalItems:'Pro Maintenance, Updates',
    renewalAmount:16000, renewalRemark:'Annual pro renewal', category:'school_management'
  },
  {
    closerYear:2025, closerDate:'2025-08-14', clientName:'BillPro Max', clientMob:'2222220987',
    clientGmailID:'billpromax@gmail.com', projectName:'Billing Pro Max', domainName:'billpromax.com',
    domainBookingPlace:'cloudindia', domainBookingDate:'2025-08-10', domainBookingYear:2025,
    professionalGsuitEmailID:'max@billpromax.com', noOfEmailID:12, altEmailID:'pro@billpromax.com',
    server:'shared', clientLocation:'Mumbai', state:'Maharashtra', country:'India', clientDOB:'1992-01-08',
    campaign:'Pro Billing', bdm:'Rahul Jain', frontendDeveloper:'Poonam Gupta', backendDeveloper:'Sunil Kumar',
    projectStartDate:'2025-08-01', projectDeadline:'2025-12-31', demoDate:'2025-09-20', projectCloserDate:'2025-12-05',
    finalStatus:'Completed', projectCost:40000, withGST:47200, serverCost:5000, emailCost:1800,
    initialPayment:18000, secondPayment:14000, remPayment:15200, pendingPayment:0,
    remark:'Pro max billing operational', projectStatus:'Active', amc:'Yes',
    renewalStatus:'Active', renewalMonth:'August', renewalDate:'2026-08-14', renewalItems:'Pro Updates, Support',
    renewalAmount:8000, renewalRemark:'Annual pro renewal', category:'billing'
  }
];

// Persist sample if not present
if(!localStorage.getItem('accounts_products_data')){
  localStorage.setItem('accounts_products_data', JSON.stringify(window.sampleProductsData));
}

function getProductsData(){
  return JSON.parse(localStorage.getItem('accounts_products_data') || '[]');
}

function countProductsBy(predicate){
  return getProductsData().filter(predicate).length;
}

function renderProductCards(){
  const grid = document.getElementById('products-cards');
  grid.innerHTML = '';
  const now = new Date();
  function dueSoon(rec){
    const d = new Date(rec.renewalDate);
    const diff = (d - now) / (1000*60*60*24);
    return diff <= 60; // due within 60 days
  }
  productCategories.forEach((c,i)=>{
    const count = countProductsBy(r => r.category === c.key);
    const renewals = countProductsBy(r => r.category === c.key && dueSoon(r));
    const classes = ['acc1','acc2','acc3','acc4'][i%4];
    const a = document.createElement('a');
    a.className = `card ${classes}`;
    a.href = `reports.html?type=${c.key}`;
    a.innerHTML = `<div class="label">${c.label}</div>
                   <div style="display:flex;justify-content:space-between;align-items:end;gap:12px">
                     <div>
                       <div class="count">${count}</div>
                       <div class="muted">Renewals: ${renewals}</div>
                     </div>
                   </div>
                   <div class="tag">Open</div>`;
    grid.appendChild(a);
  });
}

document.addEventListener('DOMContentLoaded', renderProductCards);
