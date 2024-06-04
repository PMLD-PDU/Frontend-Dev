document.addEventListener('DOMContentLoaded', function() {
  fetchCompanyData();
});

async function fetchCompanyData() {
  try {
      const response = await fetch('/company-data');
      
      if (!response.ok) {
          throw new Error('Network response was not ok');
      }

      const data = await response.json();

      // Populate the company dropdown
      const companySelect = document.getElementById('inputCompany');
      data.data.forEach(company => {
          const option = document.createElement('option');
          option.value = company.id;
          option.textContent = company.name;
          companySelect.appendChild(option);
      });
  } catch (error) {
      console.error('Error in fetching company data:', error);
  }
}