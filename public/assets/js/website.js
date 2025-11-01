
/* Sample cards for categories with counts */
// Category map: route param "type"
const categories = [
  {key:'total', label:'Total Report', desc:'Active websites & applications', icon:'📊'},
  {key:'wordpress', label:'WordPress', desc:'Sites built on WP', icon:'🧱'},
  {key:'hardcode', label:'Hardcoding', desc:'Custom-coded sites', icon:'🛠️'},
  {key:'ecom', label:'E‑commerce', desc:'Online stores', icon:'🛒'},
  {key:'maintenance', label:'Modification / Maintenance', icon:'🧽', desc:'Change requests & upkeep'},
  {key:'applications', label:'Applications', icon:'📱', desc:'All apps (web/Android/iOS)'},
  {key:'webapp', label:'Web Application', icon:'🕸️'},
  {key:'android', label:'Android Application', icon:'🤖'},
  {key:'ios', label:'iOS Application', icon:'🍎'},
];

// Dummy data for first run
window.sampleData = [
  {slno:1, clientName:'Acme Corp', contact:'1234567890', gmail1:'it@acme.com', gmail2:'owner@acme.com',
   category:'wordpress', websiteUrl:'https://acme.example', appUrl:'', domain:'acme.com', domainBookingDate:'2024-09-20',
   domainPlace:'godaddy', server:'shared', mailId:'info@acme.com', gsuite:true, webmail:false, location:'New York, NY',
   gpage:'https://g.page/acme', projectCost:1200, finalCost:1200, advPayment:400, advDate:'2024-09-01', pay2Date:'2024-10-01',
   txn2:'TXN-002', txn3:'', extra:'', renewalAmount:200, renewalDate:'2025-09-20', birthday:'1990-05-14', anniversary:'2015-03-10'
  },
  {slno:2, clientName:'Blue Widgets', contact:'9876543210', gmail1:'hello@blue.com', gmail2:'', category:'ecom',
   websiteUrl:'https://shop.blue.com', appUrl:'', domain:'blue.com', domainBookingDate:'2023-12-01',
   domainPlace:'cloudindia', server:'vps', mailId:'sales@blue.com', gsuite:false, webmail:true, location:'Dallas, TX',
   gpage:'', projectCost:6000, finalCost:5800, advPayment:1000, advDate:'2023-12-10', pay2Date:'2024-01-20',
   txn2:'TXN-233', txn3:'', extra:'Discount 200', renewalAmount:500, renewalDate:'2025-12-01', birthday:'1988-11-02', anniversary:''
  },
  {slno:3, clientName:'Crafty Co', contact:'5550099', gmail1:'admin@crafty.co', gmail2:'', category:'webapp',
   websiteUrl:'', appUrl:'https://app.crafty.co', domain:'crafty.co', domainBookingDate:'2024-06-05',
   domainPlace:'godaddy', server:'vps', mailId:'support@crafty.co', gsuite:true, webmail:false, location:'Austin, TX',
   gpage:'', projectCost:8000, finalCost:8200, advPayment:2000, advDate:'2024-06-10', pay2Date:'2024-07-15',
   txn2:'TX-77', txn3:'', extra:'scope +', renewalAmount:900, renewalDate:'2025-06-05', birthday:'', anniversary:''
  },
  {slno:4, clientName:'FixIt', contact:'5557712', gmail1:'ceo@fixit.io', gmail2:'ops@fixit.io', category:'android',
   websiteUrl:'', appUrl:'https://play.google.com/store/apps/details?id=fixit', domain:'fixit.io', domainBookingDate:'2023-11-02',
   domainPlace:'hoix', server:'free', mailId:'team@fixit.io', gsuite:false, webmail:true, location:'Remote',
   gpage:'', projectCost:3000, finalCost:3000, advPayment:1000, advDate:'2023-11-12', pay2Date:'2024-01-05',
   txn2:'', txn3:'', extra:'', renewalAmount:300, renewalDate:'2024-11-02', birthday:'', anniversary:''
  },
  {slno:5, clientName:'TechStart', contact:'4445556666', gmail1:'info@techstart.com', gmail2:'hr@techstart.com',
   category:'wordpress', websiteUrl:'https://techstart.com', appUrl:'', domain:'techstart.com', domainBookingDate:'2024-08-15',
   domainPlace:'namecheap', server:'shared', mailId:'contact@techstart.com', gsuite:true, webmail:false, location:'San Francisco, CA',
   gpage:'https://g.page/techstart', projectCost:1500, finalCost:1500, advPayment:500, advDate:'2024-08-01', pay2Date:'2024-09-01',
   txn2:'TXN-005', txn3:'', extra:'', renewalAmount:250, renewalDate:'2025-08-15', birthday:'1992-07-20', anniversary:'2018-04-12'
  },
  {slno:6, clientName:'GreenShop', contact:'7778889999', gmail1:'sales@greenshop.com', gmail2:'', category:'ecom',
   websiteUrl:'https://greenshop.com', appUrl:'', domain:'greenshop.com', domainBookingDate:'2024-07-10',
   domainPlace:'godaddy', server:'vps', mailId:'orders@greenshop.com', gsuite:false, webmail:true, location:'Seattle, WA',
   gpage:'', projectCost:7500, finalCost:7300, advPayment:1500, advDate:'2024-07-20', pay2Date:'2024-08-25',
   txn2:'TXN-006', txn3:'', extra:'Setup fee waived', renewalAmount:600, renewalDate:'2025-07-10', birthday:'1985-09-15', anniversary:''
  },
  {slno:7, clientName:'DataFlow', contact:'1112223333', gmail1:'admin@dataflow.io', gmail2:'', category:'webapp',
   websiteUrl:'', appUrl:'https://dataflow.io', domain:'dataflow.io', domainBookingDate:'2024-05-20',
   domainPlace:'cloudindia', server:'cloud', mailId:'support@dataflow.io', gsuite:true, webmail:false, location:'Boston, MA',
   gpage:'', projectCost:9500, finalCost:9700, advPayment:2500, advDate:'2024-05-25', pay2Date:'2024-06-30',
   txn2:'TX-88', txn3:'', extra:'Extra features', renewalAmount:1100, renewalDate:'2025-05-20', birthday:'', anniversary:''
  },
  {slno:8, clientName:'FitTrack', contact:'6667778888', gmail1:'team@fittrack.app', gmail2:'dev@fittrack.app', category:'android',
   websiteUrl:'', appUrl:'https://play.google.com/store/apps/details?id=fittrack', domain:'fittrack.app', domainBookingDate:'2024-04-05',
   domainPlace:'hoix', server:'free', mailId:'hello@fittrack.app', gsuite:false, webmail:true, location:'Los Angeles, CA',
   gpage:'', projectCost:4000, finalCost:4000, advPayment:1200, advDate:'2024-04-15', pay2Date:'2024-05-20',
   txn2:'', txn3:'', extra:'', renewalAmount:400, renewalDate:'2025-04-05', birthday:'1995-01-30', anniversary:''
  },
  {slno:9, clientName:'Mindful', contact:'9990001111', gmail1:'contact@mindful.com', gmail2:'support@mindful.com',
   category:'ios', websiteUrl:'', appUrl:'https://apps.apple.com/app/mindful', domain:'mindful.com', domainBookingDate:'2024-03-12',
   domainPlace:'godaddy', server:'shared', mailId:'info@mindful.com', gsuite:true, webmail:false, location:'Portland, OR',
   gpage:'https://g.page/mindful', projectCost:5500, finalCost:5500, advPayment:1500, advDate:'2024-03-01', pay2Date:'2024-04-01',
   txn2:'TXN-009', txn3:'', extra:'', renewalAmount:450, renewalDate:'2025-03-12', birthday:'1987-12-08', anniversary:'2016-06-22'
  },
  {slno:10, clientName:'BuildPro', contact:'2223334444', gmail1:'projects@buildpro.com', gmail2:'', category:'hardcode',
   websiteUrl:'https://buildpro.com', appUrl:'', domain:'buildpro.com', domainBookingDate:'2024-02-28',
   domainPlace:'namecheap', server:'vps', mailId:'build@buildpro.com', gsuite:false, webmail:true, location:'Chicago, IL',
   gpage:'', projectCost:8500, finalCost:8300, advPayment:2000, advDate:'2024-03-10', pay2Date:'2024-04-15',
   txn2:'TXN-010', txn3:'', extra:'Custom design', renewalAmount:700, renewalDate:'2025-02-28', birthday:'1980-04-25', anniversary:''
  },
  {slno:11, clientName:'ServiceHub', contact:'5556667777', gmail1:'admin@servicehub.in', gmail2:'', category:'maintenance',
   websiteUrl:'https://servicehub.in', appUrl:'', domain:'servicehub.in', domainBookingDate:'2024-01-15',
   domainPlace:'cloudindia', server:'shared', mailId:'services@servicehub.in', gsuite:true, webmail:false, location:'Miami, FL',
   gpage:'', projectCost:2200, finalCost:2400, advPayment:600, advDate:'2024-01-20', pay2Date:'2024-02-25',
   txn2:'TX-11', txn3:'', extra:'Maintenance plan', renewalAmount:300, renewalDate:'2025-01-15', birthday:'', anniversary:''
  },
  {slno:12, clientName:'EduLearn', contact:'8889990000', gmail1:'learn@edulearn.com', gmail2:'admin@edulearn.com',
   category:'wordpress', websiteUrl:'https://edulearn.com', appUrl:'', domain:'edulearn.com', domainBookingDate:'2023-12-10',
   domainPlace:'godaddy', server:'shared', mailId:'courses@edulearn.com', gsuite:true, webmail:false, location:'Denver, CO',
   gpage:'https://g.page/edulearn', projectCost:1800, finalCost:1800, advPayment:600, advDate:'2023-12-01', pay2Date:'2024-01-01',
   txn2:'TXN-012', txn3:'', extra:'', renewalAmount:300, renewalDate:'2024-12-10', birthday:'1993-08-14', anniversary:'2019-02-18'
  },
  {slno:13, clientName:'ShopLocal', contact:'3334445555', gmail1:'store@shoplocal.com', gmail2:'', category:'ecom',
   websiteUrl:'https://shoplocal.com', appUrl:'', domain:'shoplocal.com', domainBookingDate:'2023-11-05',
   domainPlace:'namecheap', server:'vps', mailId:'orders@shoplocal.com', gsuite:false, webmail:true, location:'Phoenix, AZ',
   gpage:'', projectCost:6800, finalCost:6600, advPayment:1300, advDate:'2023-11-15', pay2Date:'2023-12-20',
   txn2:'TXN-013', txn3:'', extra:'SEO included', renewalAmount:550, renewalDate:'2024-11-05', birthday:'1989-10-30', anniversary:''
  },
  {slno:14, clientName:'TaskMaster', contact:'7778889990', gmail1:'tasks@taskmaster.io', gmail2:'', category:'webapp',
   websiteUrl:'', appUrl:'https://taskmaster.io', domain:'taskmaster.io', domainBookingDate:'2023-10-20',
   domainPlace:'cloudindia', server:'cloud', mailId:'help@taskmaster.io', gsuite:true, webmail:false, location:'Atlanta, GA',
   gpage:'', projectCost:10200, finalCost:10400, advPayment:2800, advDate:'2023-10-25', pay2Date:'2023-11-30',
   txn2:'TX-14', txn3:'', extra:'API integration', renewalAmount:1200, renewalDate:'2024-10-20', birthday:'', anniversary:''
  },
  {slno:15, clientName:'HealthFit', contact:'1112223330', gmail1:'fitness@healthfit.app', gmail2:'coach@healthfit.app', category:'android',
   websiteUrl:'', appUrl:'https://play.google.com/store/apps/details?id=healthfit', domain:'healthfit.app', domainBookingDate:'2023-09-08',
   domainPlace:'hoix', server:'free', mailId:'support@healthfit.app', gsuite:false, webmail:true, location:'Nashville, TN',
   gpage:'', projectCost:3500, finalCost:3500, advPayment:1100, advDate:'2023-09-18', pay2Date:'2023-10-25',
   txn2:'', txn3:'', extra:'', renewalAmount:350, renewalDate:'2024-09-08', birthday:'1996-03-12', anniversary:''
  },
  {slno:16, clientName:'Meditation', contact:'4445556660', gmail1:'zen@meditation.com', gmail2:'guide@meditation.com',
   category:'ios', websiteUrl:'', appUrl:'https://apps.apple.com/app/meditation', domain:'meditation.com', domainBookingDate:'2023-08-15',
   domainPlace:'godaddy', server:'shared', mailId:'peace@meditation.com', gsuite:true, webmail:false, location:'Salt Lake City, UT',
   gpage:'https://g.page/meditation', projectCost:4800, finalCost:4800, advPayment:1300, advDate:'2023-08-01', pay2Date:'2023-09-01',
   txn2:'TXN-016', txn3:'', extra:'', renewalAmount:400, renewalDate:'2024-08-15', birthday:'1984-11-28', anniversary:'2014-09-05'
  },
  {slno:17, clientName:'CodeCraft', contact:'6667778880', gmail1:'dev@codecraft.com', gmail2:'', category:'hardcode',
   websiteUrl:'https://codecraft.com', appUrl:'', domain:'codecraft.com', domainBookingDate:'2023-07-22',
   domainPlace:'namecheap', server:'vps', mailId:'code@codecraft.com', gsuite:false, webmail:true, location:'Raleigh, NC',
   gpage:'', projectCost:9200, finalCost:9000, advPayment:2200, advDate:'2023-08-01', pay2Date:'2023-09-10',
   txn2:'TXN-017', txn3:'', extra:'Responsive design', renewalAmount:750, renewalDate:'2024-07-22', birthday:'1981-06-17', anniversary:''
  },
  {slno:18, clientName:'UpdatePro', contact:'8889990001', gmail1:'updates@updatepro.in', gmail2:'', category:'maintenance',
   websiteUrl:'https://updatepro.in', appUrl:'', domain:'updatepro.in', domainBookingDate:'2023-06-30',
   domainPlace:'cloudindia', server:'shared', mailId:'service@updatepro.in', gsuite:true, webmail:false, location:'Tampa, FL',
   gpage:'', projectCost:2600, finalCost:2800, advPayment:700, advDate:'2023-07-05', pay2Date:'2023-08-10',
   txn2:'TX-18', txn3:'', extra:'Security updates', renewalAmount:350, renewalDate:'2024-06-30', birthday:'', anniversary:''
  },
  {slno:19, clientName:'BlogSpace', contact:'2223334440', gmail1:'write@blogspace.com', gmail2:'editor@blogspace.com',
   category:'wordpress', websiteUrl:'https://blogspace.com', appUrl:'', domain:'blogspace.com', domainBookingDate:'2023-05-18',
   domainPlace:'godaddy', server:'shared', mailId:'blogs@blogspace.com', gsuite:true, webmail:false, location:'Minneapolis, MN',
   gpage:'https://g.page/blogspace', projectCost:1400, finalCost:1400, advPayment:450, advDate:'2023-05-01', pay2Date:'2023-06-01',
   txn2:'TXN-019', txn3:'', extra:'', renewalAmount:250, renewalDate:'2024-05-18', birthday:'1994-09-22', anniversary:'2020-01-14'
  },
  {slno:20, clientName:'MarketHub', contact:'5556667770', gmail1:'market@markethub.com', gmail2:'', category:'ecom',
   websiteUrl:'https://markethub.com', appUrl:'', domain:'markethub.com', domainBookingDate:'2023-04-12',
   domainPlace:'namecheap', server:'vps', mailId:'sales@markethub.com', gsuite:false, webmail:true, location:'Las Vegas, NV',
   gpage:'', projectCost:7200, finalCost:7000, advPayment:1400, advDate:'2023-04-22', pay2Date:'2023-05-28',
   txn2:'TXN-020', txn3:'', extra:'Analytics setup', renewalAmount:580, renewalDate:'2024-04-12', birthday:'1986-12-07', anniversary:''
  }
];

// Persist sample if nothing yet
if(!localStorage.getItem('accounts_wa_data')){
  localStorage.setItem('accounts_wa_data', JSON.stringify(window.sampleData));
}

function getData(){
  return JSON.parse(localStorage.getItem('accounts_wa_data')||'[]');
}

function countBy(predicate){
  return getData().filter(predicate).length;
}

function renderCards(){
  const grid = document.getElementById('wa-cards');
  grid.innerHTML = '';
  const now = new Date();
  function dueSoon(rec){
    const d = new Date(rec.renewalDate);
    const diff = (d - now) / (1000*60*60*24);
    return diff <= 60; // due within 60 days
  }
  categories.forEach((c,i)=>{
    const count = c.key==='total' ? getData().length : countBy(r=>r.category===c.key || (c.key==='applications' && ['webapp','android','ios'].includes(r.category)));
    const renewals = c.key==='total'
      ? getData().filter(dueSoon).length
      : (c.key==='applications'
          ? getData().filter(r=>['webapp','android','ios'].includes(r.category) && dueSoon(r)).length
          : getData().filter(r=>r.category===c.key && dueSoon(r)).length);
    const classes = ['acc1','acc2','acc3','acc4'][i%4];
    const a = document.createElement('a');
    a.className = `card ${classes}`;
    a.href = `reports.html?type=${c.key}`;
    a.innerHTML = `<div class="label">${c.label}</div>
                   <div class="muted">${c.desc||''}</div>
                   <div style="display:flex;justify-content:space-between;align-items:end;gap:12px">
                     <div>
                       <div class="count">${count}</div>
                       <div class="muted">Renewals: ${renewals}</div>
                     </div>
                     <div style="font-size:34px">${c.icon||'📦'}</div>
                   </div>
                   <div class="tag">Open</div>`;
    grid.appendChild(a);
  });
}

renderCards();
