<?xml version="1.0" encoding="utf-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output
    method="html"
    indent="yes"
    encoding="utf-8"
/>

<xsl:template match="/news">
  <html>
    <head>
      <title>Current Stories</title>
    </head>
    <body bgcolor="white">
      <xsl:call-template name="stories"/>
    </body>
  </html>
</xsl:template>
<xsl:template name="stories">
  <xsl:for-each select="story">
    <h1><xsl:value-of select="title"/></h1>
    <p>
    <xsl:value-of select="author"/>(<xsl:value-of select="time"/>)<br/>
    <xsl:value-of select="teaser"/>
    [ <a href="{url}">More</a>]
    </p>
    <hr />
  </xsl:for-each>
</xsl:template>
</xsl:stylesheet>