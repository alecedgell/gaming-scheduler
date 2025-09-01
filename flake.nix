{
  description = "Allows running npm dev server and correct PHP version via caddy";

  inputs = {
    nixpkgs.url = "github:nixos/nixpkgs?ref=nixos-unstable";
  };

  outputs =
    { self, nixpkgs }:
    let
      linuxpkgs = nixpkgs.legacyPackages.x86_64-linux;
      macIntelpkgs = nixpkgs.legacyPackages.x86_64-darwin;
    in
    {
      devShells = {
        x86_64-darwin.default = macIntelpkgs.mkShell {
          buildInputs = with macIntelpkgs; [
            nodejs
            php81
            php81Packages.composer
            caddy
            mkcert
          ];
        };
        x86_64-linux.default = linuxpkgs.mkShell {
          buildInputs =
            with linuxpkgs;
            let
              php = linuxpkgs.php.buildEnv {
                extraConfig = "upload_max_filesize = 10M";
              };
            in
            [
              nodejs
              php
              phpPackages.composer
            ];
        };
      };
    };
}
