/* Graphics module - Sample data and card rendering */
const graphicsCategories = [
  {key:'logo', label:'Logo', icon:'🎨'},
  {key:'other_graphics', label:'Other Graphics', icon:'🖼️'},
  {key:'company_profile', label:'Company Profile/Catalog', icon:'📄'}
];

// Sample data for Graphics module
window.sampleGraphicsData = [
  {
    srNo:1, project:'Logo Design', campaign:'Brand Identity', projectName:'Company Logo',
    domainName:'companyx.com', clientName:'Company X', clientNumber:'1234567890',
    bdm:'Alex Johnson', assignedPerson:'Designer A', tl:'Team Lead 1', projectMonth:'January',
    projectClosingDate:'2024-01-31', projectStartingDt:'2024-01-15', projectClosingDt:'2024-01-30',
    remark:'Logo design approved', clientCharges:500, initialPayment:200, secondPayment:200,
    remainingPayment:100, projectStatus:'Completed', clientNo:'CX001', mailID:'contact@companyx.com',
    amc:100, category:'logo', renewalDate:'2024-12-01'
  },
  {
    srNo:2, project:'Social Media Graphics', campaign:'Social Media Boost', projectName:'Social Media Kit',
    domainName:'brandy.com', clientName:'Brand Y', clientNumber:'9876543210',
    bdm:'Sarah Wilson', assignedPerson:'Designer B', tl:'Team Lead 2', projectMonth:'February',
    projectClosingDate:'2024-02-28', projectStartingDt:'2024-02-10', projectClosingDt:'2024-02-25',
    remark:'Graphics delivered', clientCharges:800, initialPayment:300, secondPayment:300,
    remainingPayment:200, projectStatus:'Active', clientNo:'BY002', mailID:'info@brandy.com',
    amc:150, category:'other_graphics', renewalDate:'2024-11-15'
  },
  {
    srNo:3, project:'Company Profile', campaign:'Corporate Branding', projectName:'Corporate Profile',
    domainName:'corpz.com', clientName:'Corp Z', clientNumber:'8765432109',
    bdm:'Mike Brown', assignedPerson:'Designer C', tl:'Team Lead 3', projectMonth:'March',
    projectClosingDate:'2024-03-31', projectStartingDt:'2024-03-05', projectClosingDt:'2024-03-25',
    remark:'Profile design in progress', clientCharges:1200, initialPayment:500, secondPayment:400,
    remainingPayment:300, projectStatus:'Active', clientNo:'CZ003', mailID:'admin@corpz.com',
    amc:200, category:'company_profile', renewalDate:'2024-10-20'
  },
  {
    srNo:4, project:'Product Catalog', campaign:'Product Showcase', projectName:'Product Catalog Design',
    domainName:'productco.com', clientName:'Product Co', clientNumber:'6543210987',
    bdm:'Lisa Davis', assignedPerson:'Designer D', tl:'Team Lead 4', projectMonth:'April',
    projectClosingDate:'2024-04-30', projectStartingDt:'2024-04-10', projectClosingDt:'2024-04-25',
    remark:'Catalog design completed', clientCharges:1500, initialPayment:600, secondPayment:500,
    remainingPayment:400, projectStatus:'Completed', clientNo:'PC004', mailID:'sales@productco.com',
    amc:250, category:'company_profile', renewalDate:'2024-09-15'
  },
  {
    srNo:5, project:'Brand Logo', campaign:'Brand Launch', projectName:'Modern Logo Design',
    domainName:'brandnew.com', clientName:'Brand New', clientNumber:'5432109876',
    bdm:'Chris Wilson', assignedPerson:'Designer E', tl:'Team Lead 5', projectMonth:'May',
    projectClosingDate:'2024-05-31', projectStartingDt:'2024-05-15', projectClosingDt:'2024-05-28',
    remark:'Logo design finalized', clientCharges:600, initialPayment:250, secondPayment:250,
    remainingPayment:100, projectStatus:'Completed', clientNo:'BN005', mailID:'hello@brandnew.com',
    amc:120, category:'logo', renewalDate:'2024-08-10'
  },
  {
    srNo:6, project:'Banner Graphics', campaign:'Website Promotion', projectName:'Website Banner Set',
    domainName:'webpromo.com', clientName:'Web Promo', clientNumber:'4321098765',
    bdm:'Emma Thompson', assignedPerson:'Designer F', tl:'Team Lead 6', projectMonth:'June',
    projectClosingDate:'2024-06-30', projectStartingDt:'2024-06-10', projectClosingDt:'2024-06-25',
    remark:'Banners delivered', clientCharges:900, initialPayment:350, secondPayment:350,
    remainingPayment:200, projectStatus:'Active', clientNo:'WP006', mailID:'info@webpromo.com',
    amc:180, category:'other_graphics', renewalDate:'2024-07-15'
  },
  {
    srNo:7, project:'Business Profile', campaign:'Corporate Identity', projectName:'Business Profile Design',
    domainName:'bizcorp.com', clientName:'Biz Corp', clientNumber:'3210987654',
    bdm:'Daniel Brown', assignedPerson:'Designer G', tl:'Team Lead 7', projectMonth:'July',
    projectClosingDate:'2024-07-31', projectStartingDt:'2024-07-05', projectClosingDt:'2024-07-20',
    remark:'Profile design in review', clientCharges:1300, initialPayment:550, secondPayment:450,
    remainingPayment:300, projectStatus:'Active', clientNo:'BC007', mailID:'admin@bizcorp.com',
    amc:220, category:'company_profile', renewalDate:'2024-06-20'
  },
  {
    srNo:8, project:'Icon Set', campaign:'App Development', projectName:'Mobile App Icons',
    domainName:'appdev.com', clientName:'App Dev', clientNumber:'2109876543',
    bdm:'Olivia Davis', assignedPerson:'Designer H', tl:'Team Lead 8', projectMonth:'August',
    projectClosingDate:'2024-08-31', projectStartingDt:'2024-08-12', projectClosingDt:'2024-08-28',
    remark:'Icon set completed', clientCharges:700, initialPayment:300, secondPayment:300,
    remainingPayment:100, projectStatus:'Completed', clientNo:'AD008', mailID:'dev@appdev.com',
    amc:140, category:'other_graphics', renewalDate:'2024-05-25'
  },
  {
    srNo:9, project:'Restaurant Logo', campaign:'Restaurant Branding', projectName:'Restaurant Logo & Signage',
    domainName:'foodee.com', clientName:'Food Dee', clientNumber:'1098765432',
    bdm:'William Johnson', assignedPerson:'Designer I', tl:'Team Lead 9', projectMonth:'September',
    projectClosingDate:'2024-09-30', projectStartingDt:'2024-09-08', projectClosingDt:'2024-09-22',
    remark:'Logo approved by client', clientCharges:800, initialPayment:350, secondPayment:300,
    remainingPayment:150, projectStatus:'Completed', clientNo:'FD009', mailID:'chef@foodee.com',
    amc:160, category:'logo', renewalDate:'2024-04-30'
  },
  {
    srNo:10, project:'Infographic Design', campaign:'Content Marketing', projectName:'Educational Infographics',
    domainName:'learnmore.com', clientName:'Learn More', clientNumber:'0987654321',
    bdm:'Sophia Martinez', assignedPerson:'Designer J', tl:'Team Lead 10', projectMonth:'October',
    projectClosingDate:'2024-10-31', projectStartingDt:'2024-10-05', projectClosingDt:'2024-10-20',
    remark:'Infographics delivered', clientCharges:1100, initialPayment:450, secondPayment:400,
    remainingPayment:250, projectStatus:'Active', clientNo:'LM010', mailID:'learn@learnmore.com',
    amc:200, category:'other_graphics', renewalDate:'2024-03-15'
  },
  {
    srNo:11, project:'Annual Report', campaign:'Corporate Reporting', projectName:'Annual Report Design',
    domainName:'corpannual.com', clientName:'Corp Annual', clientNumber:'9876543210',
    bdm:'James Anderson', assignedPerson:'Designer K', tl:'Team Lead 11', projectMonth:'November',
    projectClosingDate:'2024-11-30', projectStartingDt:'2024-11-10', projectClosingDt:'2024-11-25',
    remark:'Report design in progress', clientCharges:2000, initialPayment:800, secondPayment:700,
    remainingPayment:500, projectStatus:'Active', clientNo:'CA011', mailID:'reports@corpannual.com',
    amc:300, category:'company_profile', renewalDate:'2024-02-20'
  },
  {
    srNo:12, project:'Startup Logo', campaign:'Startup Launch', projectName:'Startup Brand Identity',
    domainName:'startupx.com', clientName:'Startup X', clientNumber:'8765432109',
    bdm:'Isabella Garcia', assignedPerson:'Designer L', tl:'Team Lead 12', projectMonth:'December',
    projectClosingDate:'2024-12-31', projectStartingDt:'2024-12-15', projectClosingDt:'2024-12-28',
    remark:'Brand identity completed', clientCharges:750, initialPayment:300, secondPayment:300,
    remainingPayment:150, projectStatus:'Completed', clientNo:'SX012', mailID:'founder@startupx.com',
    amc:150, category:'logo', renewalDate:'2024-01-15'
  },
  {
    srNo:13, project:'Social Media Templates', campaign:'Social Media Strategy', projectName:'Social Media Graphics Kit',
    domainName:'socialboost.com', clientName:'Social Boost', clientNumber:'7654321098',
    bdm:'Lucas Rodriguez', assignedPerson:'Designer M', tl:'Team Lead 13', projectMonth:'January',
    projectClosingDate:'2025-01-31', projectStartingDt:'2025-01-08', projectClosingDt:'2025-01-22',
    remark:'Templates delivered', clientCharges:950, initialPayment:400, secondPayment:400,
    remainingPayment:150, projectStatus:'Active', clientNo:'SB013', mailID:'social@socialboost.com',
    amc:190, category:'other_graphics', renewalDate:'2024-12-10'
  },
  {
    srNo:14, project:'Product Brochure', campaign:'Product Launch', projectName:'Product Brochure Design',
    domainName:'productlaunch.com', clientName:'Product Launch', clientNumber:'6543210987',
    bdm:'Mia Thompson', assignedPerson:'Designer N', tl:'Team Lead 14', projectMonth:'February',
    projectClosingDate:'2025-02-28', projectStartingDt:'2025-02-05', projectClosingDt:'2025-02-18',
    remark:'Brochure design approved', clientCharges:1400, initialPayment:600, secondPayment:500,
    remainingPayment:300, projectStatus:'Completed', clientNo:'PL014', mailID:'marketing@productlaunch.com',
    amc:240, category:'company_profile', renewalDate:'2024-11-05'
  },
  {
    srNo:15, project:'Fashion Logo', campaign:'Fashion Brand', projectName:'Fashion Brand Logo',
    domainName:'fashionista.com', clientName:'Fashionista', clientNumber:'5432109876',
    bdm:'Ethan Jackson', assignedPerson:'Designer O', tl:'Team Lead 15', projectMonth:'March',
    projectClosingDate:'2025-03-31', projectStartingDt:'2025-03-12', projectClosingDt:'2025-03-25',
    remark:'Logo design in final review', clientCharges:850, initialPayment:350, secondPayment:350,
    remainingPayment:150, projectStatus:'Active', clientNo:'FS015', mailID:'design@fashionista.com',
    amc:170, category:'logo', renewalDate:'2024-10-01'
  },
  {
    srNo:16, project:'Presentation Graphics', campaign:'Business Presentation', projectName:'Presentation Slides',
    domainName:'presentpro.com', clientName:'Present Pro', clientNumber:'4321098765',
    bdm:'Ava White', assignedPerson:'Designer P', tl:'Team Lead 16', projectMonth:'April',
    projectClosingDate:'2025-04-30', projectStartingDt:'2025-04-08', projectClosingDt:'2025-04-20',
    remark:'Presentation graphics completed', clientCharges:1200, initialPayment:500, secondPayment:500,
    remainingPayment:200, projectStatus:'Completed', clientNo:'PP016', mailID:'present@presentpro.com',
    amc:210, category:'other_graphics', renewalDate:'2024-09-01'
  },
  {
    srNo:17, project:'Company Handbook', campaign:'Employee Onboarding', projectName:'Employee Handbook Design',
    domainName:'teamhandbook.com', clientName:'Team Handbook', clientNumber:'3210987654',
    bdm:'Noah Harris', assignedPerson:'Designer Q', tl:'Team Lead 17', projectMonth:'May',
    projectClosingDate:'2025-05-31', projectStartingDt:'2025-05-10', projectClosingDt:'2025-05-25',
    remark:'Handbook design in progress', clientCharges:1800, initialPayment:750, secondPayment:650,
    remainingPayment:400, projectStatus:'Active', clientNo:'TH017', mailID:'hr@teamhandbook.com',
    amc:280, category:'company_profile', renewalDate:'2024-08-01'
  },
  {
    srNo:18, project:'E-commerce Logo', campaign:'Online Store', projectName:'E-commerce Logo Design',
    domainName:'shoponline.com', clientName:'Shop Online', clientNumber:'2109876543',
    bdm:'Charlotte Martin', assignedPerson:'Designer R', tl:'Team Lead 18', projectMonth:'June',
    projectClosingDate:'2025-06-30', projectStartingDt:'2025-06-15', projectClosingDt:'2025-06-28',
    remark:'Logo design finalized', clientCharges:650, initialPayment:250, secondPayment:300,
    remainingPayment:100, projectStatus:'Completed', clientNo:'SO018', mailID:'store@shoponline.com',
    amc:130, category:'logo', renewalDate:'2024-07-01'
  },
  {
    srNo:19, project:'Event Graphics', campaign:'Event Promotion', projectName:'Event Banner & Posters',
    domainName:'eventpromo.com', clientName:'Event Promo', clientNumber:'1098765432',
    bdm:'Liam Thompson', assignedPerson:'Designer S', tl:'Team Lead 19', projectMonth:'July',
    projectClosingDate:'2025-07-31', projectStartingDt:'2025-07-08', projectClosingDt:'2025-07-22',
    remark:'Event graphics delivered', clientCharges:1000, initialPayment:400, secondPayment:400,
    remainingPayment:200, projectStatus:'Active', clientNo:'EP019', mailID:'events@eventpromo.com',
    amc:195, category:'other_graphics', renewalDate:'2024-06-01'
  },
  {
    srNo:20, project:'Portfolio Design', campaign:'Professional Services', projectName:'Service Portfolio',
    domainName:'serviceport.com', clientName:'Service Port', clientNumber:'0987654321',
    bdm:'Amelia Garcia', assignedPerson:'Designer T', tl:'Team Lead 20', projectMonth:'August',
    projectClosingDate:'2025-08-31', projectStartingDt:'2025-08-05', projectClosingDt:'2025-08-20',
    remark:'Portfolio design completed', clientCharges:1600, initialPayment:700, secondPayment:600,
    remainingPayment:300, projectStatus:'Completed', clientNo:'SP020', mailID:'services@serviceport.com',
    amc:260, category:'company_profile', renewalDate:'2024-05-01'
  }
];

// Persist sample if not present
if(!localStorage.getItem('accounts_graphics_data')){
  localStorage.setItem('accounts_graphics_data', JSON.stringify(window.sampleGraphicsData));
}

function getGraphicsData(){
  return JSON.parse(localStorage.getItem('accounts_graphics_data') || '[]');
}

function countGraphicsBy(predicate){
  return getGraphicsData().filter(predicate).length;
}

function renderGraphicsCards(){
  const grid = document.getElementById('graphics-cards');
  if(!grid) {
    console.error('graphics-cards element not found');
    return;
  }
  grid.innerHTML = '';
  const now = new Date();
  function dueSoon(rec){
    const d = new Date(rec.renewalDate);
    const diff = (d - now) / (1000*60*60*24);
    return diff <= 60; // due within 60 days
  }
  graphicsCategories.forEach((c,i)=>{
    const count = countGraphicsBy(r => r.category === c.key);
    const renewals = countGraphicsBy(r => r.category === c.key && dueSoon(r));
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
  console.log('Rendered graphics cards');
}

document.addEventListener('DOMContentLoaded', renderGraphicsCards);
