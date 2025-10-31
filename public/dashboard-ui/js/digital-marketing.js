/* Digital Marketing module - Sample data and card rendering */
const dmCategories = [
  {key:'seo', label:'SEO', icon:'🔍'},
  {key:'add_campaign', label:'Add Campaign', icon:'📢'},
  {key:'social_media', label:'Social Media Marketing', icon:'📱'},
  {key:'seo_add_social', label:'SEO + Add + Social', icon:'🎯'}
];

// Sample data for Digital Marketing module
window.sampleDMData = [
  {
    srNo:1, closerMonth:'January', closerDate:'2024-01-15', clientName:'Client A',
    projectName:'SEO Campaign', businessCategory:'E-commerce', domainName:'clienta.com',
    professionalEmailID:'info@clienta.com', noOfEmailID:5, server:'Shared', clientMob:'1234567890',
    clientGmailID:'clienta@gmail.com', altEmailID:'contact@clienta.com', clientLocation:'Mumbai',
    clientDOB:'1990-05-15', campaign:'SEO Optimization', bdm:'John Doe', project:'SEO',
    postingFrequency:'Weekly', totalPost:12, mailID:'seo@clienta.com', clientNumber:'9876543210',
    projectLead:'Jane Smith', ads:'Google Ads', startingMonth:'January', billingDate:'2024-01-20',
    projectStartingDt:'2024-01-01', projectClosingDt:'2024-12-31', remark:'Initial setup complete',
    clientCharges:1000, initialPayment:300, secondPayment:400, remainingPayment:300,
    projectStatus:'Active', clientNo:'CL001', mailID2:'billing@clienta.com', category:'seo', renewalDate:'2024-12-01'
  },
  {
    srNo:2, closerMonth:'February', closerDate:'2024-02-10', clientName:'Client B',
    projectName:'Google Ads Campaign', businessCategory:'Retail', domainName:'clientb.com',
    professionalEmailID:'sales@clientb.com', noOfEmailID:3, server:'VPS', clientMob:'9876543210',
    clientGmailID:'clientb@gmail.com', altEmailID:'support@clientb.com', clientLocation:'Delhi',
    clientDOB:'1985-08-20', campaign:'PPC Campaign', bdm:'Mike Johnson', project:'Google Ads',
    postingFrequency:'Daily', totalPost:30, mailID:'ads@clientb.com', clientNumber:'8765432109',
    projectLead:'Sarah Wilson', ads:'Meta Ads', startingMonth:'February', billingDate:'2024-02-15',
    projectStartingDt:'2024-02-01', projectClosingDt:'2024-11-30', remark:'Campaign performing well',
    clientCharges:1500, initialPayment:500, secondPayment:500, remainingPayment:500,
    projectStatus:'Active', clientNo:'CL002', mailID2:'accounts@clientb.com', category:'add_campaign', renewalDate:'2024-11-15'
  },
  {
    srNo:3, closerMonth:'March', closerDate:'2024-03-05', clientName:'Client C',
    projectName:'Social Media Management', businessCategory:'Services', domainName:'clientc.com',
    professionalEmailID:'hello@clientc.com', noOfEmailID:2, server:'Dedicated', clientMob:'7654321098',
    clientGmailID:'clientc@gmail.com', altEmailID:'info@clientc.com', clientLocation:'Bangalore',
    clientDOB:'1992-12-10', campaign:'Social Media Boost', bdm:'David Brown', project:'Social Media',
    postingFrequency:'3 times/week', totalPost:15, mailID:'social@clientc.com', clientNumber:'7654321098',
    projectLead:'Emily Davis', ads:'Instagram Ads', startingMonth:'March', billingDate:'2024-03-10',
    projectStartingDt:'2024-03-01', projectClosingDt:'2024-10-31', remark:'Engagement increasing',
    clientCharges:2000, initialPayment:700, secondPayment:700, remainingPayment:600,
    projectStatus:'Active', clientNo:'CL003', mailID2:'admin@clientc.com', category:'social_media', renewalDate:'2024-10-20'
  },
  {
    srNo:4, closerMonth:'April', closerDate:'2024-04-12', clientName:'Client D',
    projectName:'Complete Digital Marketing Package', businessCategory:'Technology', domainName:'clientd.com',
    professionalEmailID:'marketing@clientd.com', noOfEmailID:8, server:'Cloud', clientMob:'6543210987',
    clientGmailID:'clientd@gmail.com', altEmailID:'sales@clientd.com', clientLocation:'Pune',
    clientDOB:'1988-07-25', campaign:'Full Digital Suite', bdm:'Lisa Anderson', project:'Complete Package',
    postingFrequency:'Daily', totalPost:45, mailID:'campaign@clientd.com', clientNumber:'6543210987',
    projectLead:'Robert Taylor', ads:'Multi-platform', startingMonth:'April', billingDate:'2024-04-15',
    projectStartingDt:'2024-04-01', projectClosingDt:'2025-03-31', remark:'Comprehensive digital marketing solution',
    clientCharges:3500, initialPayment:1000, secondPayment:1200, remainingPayment:1300,
    projectStatus:'Active', clientNo:'CL004', mailID2:'finance@clientd.com', category:'seo_add_social', renewalDate:'2025-03-15'
  },
  {
    srNo:5, closerMonth:'May', closerDate:'2024-05-08', clientName:'Client E',
    projectName:'SEO Optimization', businessCategory:'Healthcare', domainName:'cliente.com',
    professionalEmailID:'info@cliente.com', noOfEmailID:4, server:'Shared', clientMob:'5432109876',
    clientGmailID:'cliente@gmail.com', altEmailID:'contact@cliente.com', clientLocation:'Chennai',
    clientDOB:'1991-03-18', campaign:'SEO Boost', bdm:'Chris Wilson', project:'SEO',
    postingFrequency:'Weekly', totalPost:10, mailID:'seo@cliente.com', clientNumber:'5432109876',
    projectLead:'Anna Martinez', ads:'Google Ads', startingMonth:'May', billingDate:'2024-05-12',
    projectStartingDt:'2024-05-01', projectClosingDt:'2025-04-30', remark:'SEO improvements underway',
    clientCharges:1200, initialPayment:400, secondPayment:400, remainingPayment:400,
    projectStatus:'Active', clientNo:'CL005', mailID2:'billing@cliente.com', category:'seo', renewalDate:'2025-04-10'
  },
  {
    srNo:6, closerMonth:'June', closerDate:'2024-06-15', clientName:'Client F',
    projectName:'Facebook Ads Campaign', businessCategory:'Fashion', domainName:'clientf.com',
    professionalEmailID:'sales@clientf.com', noOfEmailID:6, server:'VPS', clientMob:'4321098765',
    clientGmailID:'clientf@gmail.com', altEmailID:'support@clientf.com', clientLocation:'Hyderabad',
    clientDOB:'1987-09-22', campaign:'Social Ads', bdm:'Tom Garcia', project:'Facebook Ads',
    postingFrequency:'Daily', totalPost:25, mailID:'ads@clientf.com', clientNumber:'4321098765',
    projectLead:'Maria Rodriguez', ads:'Facebook Ads', startingMonth:'June', billingDate:'2024-06-20',
    projectStartingDt:'2024-06-01', projectClosingDt:'2025-05-31', remark:'Ads campaign launched',
    clientCharges:1800, initialPayment:600, secondPayment:600, remainingPayment:600,
    projectStatus:'Active', clientNo:'CL006', mailID2:'accounts@clientf.com', category:'add_campaign', renewalDate:'2025-05-25'
  },
  {
    srNo:7, closerMonth:'July', closerDate:'2024-07-22', clientName:'Client G',
    projectName:'Instagram Marketing', businessCategory:'Food', domainName:'clientg.com',
    professionalEmailID:'hello@clientg.com', noOfEmailID:3, server:'Dedicated', clientMob:'3210987654',
    clientGmailID:'clientg@gmail.com', altEmailID:'info@clientg.com', clientLocation:'Kolkata',
    clientDOB:'1994-11-05', campaign:'Instagram Growth', bdm:'Alex Lee', project:'Instagram',
    postingFrequency:'3 times/week', totalPost:18, mailID:'social@clientg.com', clientNumber:'3210987654',
    projectLead:'Sophie Chen', ads:'Instagram Ads', startingMonth:'July', billingDate:'2024-07-25',
    projectStartingDt:'2024-07-01', projectClosingDt:'2025-06-30', remark:'Growing follower base',
    clientCharges:1600, initialPayment:500, secondPayment:550, remainingPayment:550,
    projectStatus:'Active', clientNo:'CL007', mailID2:'admin@clientg.com', category:'social_media', renewalDate:'2025-06-15'
  },
  {
    srNo:8, closerMonth:'August', closerDate:'2024-08-10', clientName:'Client H',
    projectName:'Digital Marketing Suite', businessCategory:'Real Estate', domainName:'clienth.com',
    professionalEmailID:'marketing@clienth.com', noOfEmailID:10, server:'Cloud', clientMob:'2109876543',
    clientGmailID:'clienth@gmail.com', altEmailID:'sales@clienth.com', clientLocation:'Ahmedabad',
    clientDOB:'1989-06-30', campaign:'Complete Digital', bdm:'Emma Thompson', project:'Full Suite',
    postingFrequency:'Daily', totalPost:50, mailID:'campaign@clienth.com', clientNumber:'2109876543',
    projectLead:'James Wilson', ads:'Multi-platform', startingMonth:'August', billingDate:'2024-08-15',
    projectStartingDt:'2024-08-01', projectClosingDt:'2025-07-31', remark:'All channels activated',
    clientCharges:4000, initialPayment:1200, secondPayment:1400, remainingPayment:1400,
    projectStatus:'Active', clientNo:'CL008', mailID2:'finance@clienth.com', category:'seo_add_social', renewalDate:'2025-07-20'
  },
  {
    srNo:9, closerMonth:'September', closerDate:'2024-09-05', clientName:'Client I',
    projectName:'Local SEO', businessCategory:'Hospitality', domainName:'clienti.com',
    professionalEmailID:'info@clienti.com', noOfEmailID:5, server:'Shared', clientMob:'1098765432',
    clientGmailID:'clienti@gmail.com', altEmailID:'contact@clienti.com', clientLocation:'Jaipur',
    clientDOB:'1993-01-12', campaign:'Local SEO', bdm:'Olivia Davis', project:'SEO',
    postingFrequency:'Weekly', totalPost:8, mailID:'seo@clienti.com', clientNumber:'1098765432',
    projectLead:'Daniel Brown', ads:'Google Ads', startingMonth:'September', billingDate:'2024-09-10',
    projectStartingDt:'2024-09-01', projectClosingDt:'2025-08-31', remark:'Local rankings improving',
    clientCharges:1400, initialPayment:450, secondPayment:450, remainingPayment:500,
    projectStatus:'Active', clientNo:'CL009', mailID2:'billing@clienti.com', category:'seo', renewalDate:'2025-08-05'
  },
  {
    srNo:10, closerMonth:'October', closerDate:'2024-10-18', clientName:'Client J',
    projectName:'LinkedIn Ads', businessCategory:'Consulting', domainName:'clientj.com',
    professionalEmailID:'sales@clientj.com', noOfEmailID:7, server:'VPS', clientMob:'0987654321',
    clientGmailID:'clientj@gmail.com', altEmailID:'support@clientj.com', clientLocation:'Surat',
    clientDOB:'1986-04-28', campaign:'B2B Ads', bdm:'William Johnson', project:'LinkedIn Ads',
    postingFrequency:'Daily', totalPost:20, mailID:'ads@clientj.com', clientNumber:'0987654321',
    projectLead:'Isabella Garcia', ads:'LinkedIn Ads', startingMonth:'October', billingDate:'2024-10-22',
    projectStartingDt:'2024-10-01', projectClosingDt:'2025-09-30', remark:'Lead generation campaign',
    clientCharges:2200, initialPayment:700, secondPayment:750, remainingPayment:750,
    projectStatus:'Active', clientNo:'CL010', mailID2:'accounts@clientj.com', category:'add_campaign', renewalDate:'2025-09-18'
  },
  {
    srNo:11, closerMonth:'November', closerDate:'2024-11-12', clientName:'Client K',
    projectName:'Twitter Marketing', businessCategory:'Entertainment', domainName:'clientk.com',
    professionalEmailID:'hello@clientk.com', noOfEmailID:4, server:'Dedicated', clientMob:'9876543210',
    clientGmailID:'clientk@gmail.com', altEmailID:'info@clientk.com', clientLocation:'Lucknow',
    clientDOB:'1995-07-15', campaign:'Twitter Engagement', bdm:'Lucas Martinez', project:'Twitter',
    postingFrequency:'3 times/week', totalPost:22, mailID:'social@clientk.com', clientNumber:'9876543210',
    projectLead:'Ava Taylor', ads:'Twitter Ads', startingMonth:'November', billingDate:'2024-11-15',
    projectStartingDt:'2024-11-01', projectClosingDt:'2025-10-31', remark:'Building brand awareness',
    clientCharges:1900, initialPayment:600, secondPayment:650, remainingPayment:650,
    projectStatus:'Active', clientNo:'CL011', mailID2:'admin@clientk.com', category:'social_media', renewalDate:'2025-10-12'
  },
  {
    srNo:12, closerMonth:'December', closerDate:'2024-12-08', clientName:'Client L',
    projectName:'Omnichannel Marketing', businessCategory:'Automotive', domainName:'clientl.com',
    professionalEmailID:'marketing@clientl.com', noOfEmailID:12, server:'Cloud', clientMob:'8765432109',
    clientGmailID:'clientl@gmail.com', altEmailID:'sales@clientl.com', clientLocation:'Nagpur',
    clientDOB:'1988-12-03', campaign:'Omnichannel', bdm:'Mason Anderson', project:'Complete Package',
    postingFrequency:'Daily', totalPost:60, mailID:'campaign@clientl.com', clientNumber:'8765432109',
    projectLead:'Harper Thomas', ads:'Multi-platform', startingMonth:'December', billingDate:'2024-12-12',
    projectStartingDt:'2024-12-01', projectClosingDt:'2025-11-30', remark:'Integrated marketing approach',
    clientCharges:4500, initialPayment:1300, secondPayment:1600, remainingPayment:1600,
    projectStatus:'Active', clientNo:'CL012', mailID2:'finance@clientl.com', category:'seo_add_social', renewalDate:'2025-11-08'
  },
  {
    srNo:13, closerMonth:'January', closerDate:'2025-01-20', clientName:'Client M',
    projectName:'E-commerce SEO', businessCategory:'Retail', domainName:'clientm.com',
    professionalEmailID:'info@clientm.com', noOfEmailID:6, server:'Shared', clientMob:'7654321098',
    clientGmailID:'clientm@gmail.com', altEmailID:'contact@clientm.com', clientLocation:'Indore',
    clientDOB:'1990-08-25', campaign:'E-commerce SEO', bdm:'Ethan Jackson', project:'SEO',
    postingFrequency:'Weekly', totalPost:12, mailID:'seo@clientm.com', clientNumber:'7654321098',
    projectLead:'Charlotte White', ads:'Google Ads', startingMonth:'January', billingDate:'2025-01-25',
    projectStartingDt:'2025-01-01', projectClosingDt:'2025-12-31', remark:'Product page optimization',
    clientCharges:1600, initialPayment:500, secondPayment:550, remainingPayment:550,
    projectStatus:'Active', clientNo:'CL013', mailID2:'billing@clientm.com', category:'seo', renewalDate:'2025-12-20'
  },
  {
    srNo:14, closerMonth:'February', closerDate:'2025-02-14', clientName:'Client N',
    projectName:'TikTok Ads', businessCategory:'Youth', domainName:'clientn.com',
    professionalEmailID:'sales@clientn.com', noOfEmailID:5, server:'VPS', clientMob:'6543210987',
    clientGmailID:'clientn@gmail.com', altEmailID:'support@clientn.com', clientLocation:'Bhopal',
    clientDOB:'1997-02-18', campaign:'TikTok Campaign', bdm:'Aiden Harris', project:'TikTok Ads',
    postingFrequency:'Daily', totalPost:35, mailID:'ads@clientn.com', clientNumber:'6543210987',
    projectLead:'Amelia Martin', ads:'TikTok Ads', startingMonth:'February', billingDate:'2025-02-18',
    projectStartingDt:'2025-02-01', projectClosingDt:'2026-01-31', remark:'Viral content creation',
    clientCharges:2500, initialPayment:800, secondPayment:850, remainingPayment:850,
    projectStatus:'Active', clientNo:'CL014', mailID2:'accounts@clientn.com', category:'add_campaign', renewalDate:'2026-01-14'
  },
  {
    srNo:15, closerMonth:'March', closerDate:'2025-03-10', clientName:'Client O',
    projectName:'Pinterest Marketing', businessCategory:'Lifestyle', domainName:'cliento.com',
    professionalEmailID:'hello@cliento.com', noOfEmailID:4, server:'Dedicated', clientMob:'5432109876',
    clientGmailID:'cliento@gmail.com', altEmailID:'info@cliento.com', clientLocation:'Patna',
    clientDOB:'1992-05-30', campaign:'Pinterest Growth', bdm:'Mia Thompson', project:'Pinterest',
    postingFrequency:'3 times/week', totalPost:16, mailID:'social@cliento.com', clientNumber:'5432109876',
    projectLead:'Benjamin Garcia', ads:'Pinterest Ads', startingMonth:'March', billingDate:'2025-03-15',
    projectStartingDt:'2025-03-01', projectClosingDt:'2026-02-28', remark:'Visual content strategy',
    clientCharges:1700, initialPayment:550, secondPayment:575, remainingPayment:575,
    projectStatus:'Active', clientNo:'CL015', mailID2:'admin@cliento.com', category:'social_media', renewalDate:'2026-02-10'
  },
  {
    srNo:16, closerMonth:'April', closerDate:'2025-04-05', clientName:'Client P',
    projectName:'Enterprise Digital Marketing', businessCategory:'Corporate', domainName:'clientp.com',
    professionalEmailID:'marketing@clientp.com', noOfEmailID:15, server:'Cloud', clientMob:'4321098765',
    clientGmailID:'clientp@gmail.com', altEmailID:'sales@clientp.com', clientLocation:'Raipur',
    clientDOB:'1985-10-08', campaign:'Enterprise Suite', bdm:'Elijah Robinson', project:'Full Suite',
    postingFrequency:'Daily', totalPost:75, mailID:'campaign@clientp.com', clientNumber:'4321098765',
    projectLead:'Abigail Clark', ads:'Multi-platform', startingMonth:'April', billingDate:'2025-04-10',
    projectStartingDt:'2025-04-01', projectClosingDt:'2026-03-31', remark:'Enterprise-level digital marketing',
    clientCharges:5500, initialPayment:1600, secondPayment:1900, remainingPayment:2000,
    projectStatus:'Active', clientNo:'CL016', mailID2:'finance@clientp.com', category:'seo_add_social', renewalDate:'2026-03-05'
  },
  {
    srNo:17, closerMonth:'May', closerDate:'2025-05-22', clientName:'Client Q',
    projectName:'Voice Search SEO', businessCategory:'Technology', domainName:'clientq.com',
    professionalEmailID:'info@clientq.com', noOfEmailID:7, server:'Shared', clientMob:'3210987654',
    clientGmailID:'clientq@gmail.com', altEmailID:'contact@clientq.com', clientLocation:'Ranchi',
    clientDOB:'1991-12-14', campaign:'Voice SEO', bdm:'Logan Lewis', project:'SEO',
    postingFrequency:'Weekly', totalPost:14, mailID:'seo@clientq.com', clientNumber:'3210987654',
    projectLead:'Ella Walker', ads:'Google Ads', startingMonth:'May', billingDate:'2025-05-27',
    projectStartingDt:'2025-05-01', projectClosingDt:'2026-04-30', remark:'Voice search optimization',
    clientCharges:1800, initialPayment:600, secondPayment:600, remainingPayment:600,
    projectStatus:'Active', clientNo:'CL017', mailID2:'billing@clientq.com', category:'seo', renewalDate:'2026-04-22'
  },
  {
    srNo:18, closerMonth:'June', closerDate:'2025-06-18', clientName:'Client R',
    projectName:'YouTube Ads', businessCategory:'Education', domainName:'clientr.com',
    professionalEmailID:'sales@clientr.com', noOfEmailID:8, server:'VPS', clientMob:'2109876543',
    clientGmailID:'clientr@gmail.com', altEmailID:'support@clientr.com', clientLocation:'Guwahati',
    clientDOB:'1989-03-27', campaign:'Video Ads', bdm:'Jackson Hall', project:'YouTube Ads',
    postingFrequency:'Daily', totalPost:40, mailID:'ads@clientr.com', clientNumber:'2109876543',
    projectLead:'Sofia Young', ads:'YouTube Ads', startingMonth:'June', billingDate:'2025-06-22',
    projectStartingDt:'2025-06-01', projectClosingDt:'2026-05-31', remark:'Educational content promotion',
    clientCharges:2800, initialPayment:900, secondPayment:950, remainingPayment:950,
    projectStatus:'Active', clientNo:'CL018', mailID2:'accounts@clientr.com', category:'add_campaign', renewalDate:'2026-05-18'
  },
  {
    srNo:19, closerMonth:'July', closerDate:'2025-07-15', clientName:'Client S',
    projectName:'LinkedIn B2B Marketing', businessCategory:'B2B Services', domainName:'clients.com',
    professionalEmailID:'hello@clients.com', noOfEmailID:9, server:'Dedicated', clientMob:'1098765432',
    clientGmailID:'clients@gmail.com', altEmailID:'info@clients.com', clientLocation:'Chandigarh',
    clientDOB:'1987-08-19', campaign:'B2B LinkedIn', bdm:'Levi King', project:'LinkedIn',
    postingFrequency:'3 times/week', totalPost:24, mailID:'social@clients.com', clientNumber:'1098765432',
    projectLead:'Victoria Wright', ads:'LinkedIn Ads', startingMonth:'July', billingDate:'2025-07-20',
    projectStartingDt:'2025-07-01', projectClosingDt:'2026-06-30', remark:'Professional networking focus',
    clientCharges:2400, initialPayment:750, secondPayment:825, remainingPayment:825,
    projectStatus:'Active', clientNo:'CL019', mailID2:'admin@clients.com', category:'social_media', renewalDate:'2026-06-15'
  },
  {
    srNo:20, closerMonth:'August', closerDate:'2025-08-12', clientName:'Client T',
    projectName:'Global Digital Campaign', businessCategory:'International', domainName:'clientt.com',
    professionalEmailID:'marketing@clientt.com', noOfEmailID:20, server:'Cloud', clientMob:'0987654321',
    clientGmailID:'clientt@gmail.com', altEmailID:'sales@clientt.com', clientLocation:'Global',
    clientDOB:'1984-01-05', campaign:'Global Digital', bdm:'Noah Lopez', project:'Complete Package',
    postingFrequency:'Daily', totalPost:90, mailID:'campaign@clientt.com', clientNumber:'0987654321',
    projectLead:'Grace Hill', ads:'Multi-platform', startingMonth:'August', billingDate:'2025-08-17',
    projectStartingDt:'2025-08-01', projectClosingDt:'2026-07-31', remark:'International market expansion',
    clientCharges:6500, initialPayment:2000, secondPayment:2250, remainingPayment:2250,
    projectStatus:'Active', clientNo:'CL020', mailID2:'finance@clientt.com', category:'seo_add_social', renewalDate:'2026-07-12'
  }
];

// Persist sample if not present
if(!localStorage.getItem('accounts_dm_data')){
  localStorage.setItem('accounts_dm_data', JSON.stringify(window.sampleDMData));
}

function getDMData(){
  return JSON.parse(localStorage.getItem('accounts_dm_data') || '[]');
}

function countDMBy(predicate){
  return getDMData().filter(predicate).length;
}

function renderDMCards(){
  const grid = document.getElementById('dm-cards');
  if(!grid) {
    console.error('dm-cards element not found');
    return;
  }
  grid.innerHTML = '';
  const now = new Date();
  function dueSoon(rec){
    const d = new Date(rec.renewalDate);
    const diff = (d - now) / (1000*60*60*24);
    return diff <= 60; // due within 60 days
  }
  dmCategories.forEach((c,i)=>{
    const count = countDMBy(r => r.category === c.key);
    const renewals = countDMBy(r => r.category === c.key && dueSoon(r));
    const classes = ['acc1','acc2','acc3','acc4'][i%4];
    const a = document.createElement('a');
    a.className = `card ${classes}`;
    a.href = `/digital-marketing/reports?type=${c.key}`;
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
  console.log('Rendered digital marketing cards');
}

//document.addEventListener('DOMContentLoaded', renderDMCards);
document.addEventListener('DOMContentLoaded', function () {
  const searchInput = document.getElementById('searchCampaigns');
  if (searchInput) {
    searchInput.addEventListener('input', function () {
      const value = this.value.toLowerCase();
      document.querySelectorAll('.table tbody tr').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
      });
    });
  }
});