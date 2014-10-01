<?xml version="1.0" encoding="ISO-8859-1" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <body>
    <h2>Tabel Mahasiswa</h2>
    <table border="1">
      <tr>
        <td>Nama</td>
        <td>NIM</td>
        <td>Alamat</td>
      </tr>
      <xsl:for-each select="data_mahasiswa/mhs">
        <tr>
          <td><xsl:value-of select="nama"/></td>
          <td><xsl:value-of select="nim"/></td>
          <td><xsl:value-of select="alamat"/></td>
        </tr>
      </xsl:for-each>
    </table>
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>