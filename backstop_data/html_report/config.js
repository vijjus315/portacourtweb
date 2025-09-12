report({
  "testSuite": "BackstopJS",
  "tests": [
    {
      "pair": {
        "reference": "..\\bitmaps_reference\\backstop_default_Home_Page_0_document_0_desktop.png",
        "test": "..\\bitmaps_test\\20250909-112927\\backstop_default_Home_Page_0_document_0_desktop.png",
        "selector": "document",
        "fileName": "backstop_default_Home_Page_0_document_0_desktop.png",
        "label": "Home Page",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.1,
        "url": "http://localhost:5173/",
        "referenceUrl": "https://www.portacourts.com/",
        "expect": 0,
        "viewportLabel": "desktop",
        "engineErrorMsg": "net::ERR_CONNECTION_REFUSED at http://localhost:5173/",
        "diff": {
          "isSameDimensions": false,
          "dimensionDifference": {
            "width": -1048,
            "height": -4568
          },
          "rawMisMatchPercentage": 0.6828203980623421,
          "misMatchPercentage": "0.68",
          "analysisTime": 118
        },
        "diffImage": "..\\bitmaps_test\\20250909-112927\\failed_diff_backstop_default_Home_Page_0_document_0_desktop.png"
      },
      "status": "fail"
    },
    {
      "pair": {
        "reference": "..\\bitmaps_reference\\backstop_default_Home_Page_0_document_1_phone.png",
        "test": "..\\bitmaps_test\\20250909-112927\\backstop_default_Home_Page_0_document_1_phone.png",
        "selector": "document",
        "fileName": "backstop_default_Home_Page_0_document_1_phone.png",
        "label": "Home Page",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.1,
        "url": "http://localhost:5173/",
        "referenceUrl": "https://www.portacourts.com/",
        "expect": 0,
        "viewportLabel": "phone",
        "engineErrorMsg": "net::ERR_CONNECTION_REFUSED at http://localhost:5173/",
        "diff": {
          "isSameDimensions": true,
          "dimensionDifference": {
            "width": 0,
            "height": 0
          },
          "misMatchPercentage": "0.00"
        }
      },
      "status": "pass"
    },
    {
      "pair": {
        "reference": "..\\bitmaps_reference\\backstop_default_Home_Page_0_document_2_tablet.png",
        "test": "..\\bitmaps_test\\20250909-112927\\backstop_default_Home_Page_0_document_2_tablet.png",
        "selector": "document",
        "fileName": "backstop_default_Home_Page_0_document_2_tablet.png",
        "label": "Home Page",
        "requireSameDimensions": true,
        "misMatchThreshold": 0.1,
        "url": "http://localhost:5173/",
        "referenceUrl": "https://www.portacourts.com/",
        "expect": 0,
        "viewportLabel": "tablet",
        "engineErrorMsg": "net::ERR_CONNECTION_REFUSED at http://localhost:5173/",
        "diff": {
          "isSameDimensions": false,
          "dimensionDifference": {
            "width": -792,
            "height": -4768
          },
          "rawMisMatchPercentage": 0.8189862065481002,
          "misMatchPercentage": "0.82",
          "analysisTime": 97
        },
        "diffImage": "..\\bitmaps_test\\20250909-112927\\failed_diff_backstop_default_Home_Page_0_document_2_tablet.png"
      },
      "status": "fail"
    }
  ],
  "id": "backstop_default"
});