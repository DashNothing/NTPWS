<h1>Nutrition API</h1>

<form>
  <input type="text" placeholder="Search for food..." id="searchField" />
  <input type="submit" value="Search" id="searchButton" />
</form>

<p class="hint">
  You can search for raw ingredients (eg. egg or banana),<br>
  as well as dishes (eg. pizza or chicken soup).
</p>

<div class="result-container hidden">
  <div class="result-list"></div>
  <div class="details-section">
    <h3 id="detailsHeading">Details</h3>
    <p id="detailsHint" class="details-hint">Please select a food to view its nutritional information.</p>
    <div class="details-list">
      
    </div>
  </div>
</div>

<script src="js/call-api.js"></script>