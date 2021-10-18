


  		<div class="mynav px-md-5 py-2 d-flex justify-content-between">
  			<div>
  				<h5>Bank<span><i>Loan</i></span></h5>
  			</div>
  			<div>
  				<p style="color: white"><i><?php echo $firstname." ". $lastname?></i></p>
  			</div>
  		</div>
		
		<div class="wrapper d-flex align-items-stretch">
				<nav id="sidebar">
					<div class="custom-menu">
						<button type="button" id="sidebarCollapse" class="btn btn-primary">
				          <i class="fa fa-bars"></i>
				          <span class="sr-only">Toggle Menu</span>
				        </button>
			        </div>
					<div class="p-4 pt-5">
		        <ul class="list-unstyled components mb-5">
		          <li class="active">
		            <a href="newloan.php">New loan</a>
		          </li>
		          <li>
		              <a href="previousloan.php">Previous Loans</a>
		          </li>

		          <li>
		              <a href="#ordermenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Loan Requests</a>
		              <ul class="collapse list-unstyled" id="ordermenu">
		                <li>
		                    <a href="pendingrequest.php">Pending</a>
		                </li>
		                <li>
		                    <a href="dissappreqest.php">Dissapproved requests</a>
		                </li>

		                <li>
		                    <a href="approvedloan.php">Approved requests</a>
		                </li>
		               
		              </ul>
		          </li>
		          
		          
		          <li>
	              <a href="investments.php">Make Investments</a>
	              <a href="avalblbnk.php">Available Banks</a>

	              <!-- <a href="user-profile">Balance Wallet</a> -->

	              <a href="profile.php">Profile</a>
	              <a href="../logout.php">Logout</a>
		          </li>
		          <!-- <li>
	              <a href="#">Contact</a>
		          </li> -->
		        </ul>


		        <div class="footer" style="position:absolute;bottom:0;">
		        	<p>
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
					</p>
		        </div>

		      </div>
	    	</nav>

	   


  