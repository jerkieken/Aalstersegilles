<h3>Contacteer ons</h3>

													<form method="post" action="./_include/sendform.php">
														<div class="row gtr-uniform">
															<div class="col-6 col-12-xsmall">
																<input type="text" name="naam" id="naam" value="" placeholder="Naam" />
															</div>
															<div class="col-6 col-12-xsmall">
																<input type="email" name="email" id="email" value="" placeholder="Mailadres" />
															</div>
															<!-- Break -->
															<div class="col-6 col-12-xsmall">
																<input type="text" name="vereniging" id="vereniging" value="" placeholder="Vereniging, hoedanigheid" />
															</div>
															<!--Break -->
															<div class="col-6 col-12-xsmall">
																<select name="onderwerp" id="onderwerp">
																    <option value="0" selected hidden>- Onderwerp -</option>
																	<option value="1">algemeen</option>
																	<option value="2">GDPR</option>
																	<option value="3">online (site, facebook,...)</option>
																</select>
															</div>
														<!-- Break -->
															<div class="col-6 col-12-small">
																<input type="checkbox" id="copy" name="copy">
																<label for="copy">verzend ook naar mezelf</label>
															</div>
															<div class="col-6 col-12-small">
																<input type="checkbox" id="human" name="human" required>
																<label for="human">ik leef! (Captcha controle)</label>
															</div>
															<!-- Break -->
															<div class="col-12">
																<textarea name="bericht" id="bericht" placeholder="Schrijf jouw bericht." rows="6"></textarea>
															</div>
															<!-- Break -->
															<div class="col-12">
																<ul class="actions">
																	<li><input type="submit" value="Send Message" class="primary" /></li>
																	<li><input type="reset" value="Reset" /></li>
																</ul>
															</div>
														</div>
													</form>