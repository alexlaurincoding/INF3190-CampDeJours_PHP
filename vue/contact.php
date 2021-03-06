<h1>Camp de jour des nerds</h1>
      <nav
        style="
          --bs-breadcrumb-divider: url(
            &#34;data:image/svg + xml,
            %3Csvgxmlns='http://www.w3.org/2000/svg'width='8'height='8'%3E%3Cpathd='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z'fill='currentColor'/%3E%3C/svg%3E&#34;
          );
        "
        aria-label="breadcrumb"
        class="mb-4"
      >
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?=Util::getChemin()?>">Accueil</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contact</li>
        </ol>
      </nav>

      <div class="container">
        <div class="row">
          <div class="col-6">
            <div id="map-container" class="z-depth-1-half map-container">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2795.874584268708!2d-73.56278418417922!3d45.512603238232835!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4cc91a4ff35a6e0d%3A0x1dc2d9ad7f3e5880!2zVW5pdmVyc2l0w6kgZHUgUXXDqWJlYyDDoCBNb250csOpYWw!5e0!3m2!1sfr!2sca!4v1623714645241!5m2!1sfr!2sca"
                style="border: 0"
                width="600"
                height="450"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <h2>Camp de jour des nerds</h2>
                <h4>Parce que vous le codez bien</h4>
                <p class="mt-3">
                  <i class="fas fa-map-marker-alt"></i> 405 Rue Sainte-Catherine
                  Est, Montréal, QC H2L 2C4
                </p>
                <p class="mt-3"><i class="fas fa-phone"></i> (514) 555-1234</p>
                <p class="mt-3">
                  <i class="fas fa-envelope"></i> info@lesnerds.com
                </p>
                <form>
                  <input
                    type="email"
                    class="form-control my-2"
                    placeholder="Courriel"
                  />
                  <textarea
                    class="form-control my-2"
                    placeholder="Message"
                  ></textarea>
                  <input class="form-control my-2" type="submit" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>