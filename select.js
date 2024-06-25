let contents = {
  2021: {
    CSE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
      SEM3: ["IC","DMS","DEM","JP","DS","DBMS","T&T"],
      SEM4: ["EITK","P&S","AJP","ADS","OS","CA"],
    },
    IT: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
      SEM3: ["IC","DMS","DEM","JP","DS","DBMS","T&T"],
      SEM4: ["EITK","P&S","AJP","ADS","OS","CA"],
    },
    CST: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
      SEM3: ["IC","DMS","DEM","JP","DS","DBMS","T&T"],
      SEM4: ["EITK","P&S","AJP","ADS","OS","CA"],
    },
    CSD: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
      SEM3: ["IC","DMS","DEM","JP","DS","DBMS","T&T"],
      SEM4: ["EITK","P&S","AJP","ADS","OS","CA"],
    },
    CY: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
      SEM3: ["IC","DMS","DEM","JP","DS","DBMS","T&T"],
      SEM4: ["EITK","P&S","AJP","ADS","OS","CA"],
    },
    AIDS: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
      
    },
    CIVIL: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    MECH: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    ETE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    ECE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    EEE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
  },
  2023: {
    CSE: {
      SEM1: ["TE-2", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    IT: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    CST: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    CSD: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    CY: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    AIDS: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    CIVIL: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    MECH: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    ETE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    ECE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
    EEE: {
      SEM1: ["TE-1", "M&C", "ESE", "PLD", "CCN"],
      SEM2: ["TE-2", "VCIT", "EP", "ACP", "FWS"],
    },
  },
};

function Populate() {
  var select1 = document.getElementById("Select_regulation").value;
  
  var select2 = document.getElementById("Select_dept").value;
  var select3 = document.getElementById("Select_Sem").value;

  let x = contents[select1][select2][select3];
  console.log(x);

  let select4 = document.getElementById("Select_Subject");
  select4.innerHTML = "";
  if (select1 != undefined && select2 != undefined && select3 != undefined) {
    for (const i of x) {
      let option = document.createElement("option");
      option.value = i;
      option.textContent = i;
      select4.appendChild(option);
    }
  }
}
